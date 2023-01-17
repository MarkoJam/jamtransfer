<?

// Timetable sa prikazom transfera po vozacima za odabrani datum

if (!isset($_POST["DateFrom"])) $DateFrom = "2022-09-04";
else $DateFrom	= $_POST["DateFrom"];
if (!isset($_POST["DateTo"])) $DateTo = "2022-09-04";
else $DateTo		= $_POST["DateTo"];
if (!isset($_POST["NoColumns"])) $NoColumns = 3;
else $NoColumns	= $_POST["NoColumns"];
if (!isset($_POST["DriverStatus"])) $DriverStatus = 0;
else $DriverStatus	= $_POST["DriverStatus"];
$smarty->assign("DateFrom",$DateFrom);
$smarty->assign("DateTo",$DateTo);
$smarty->assign("NoColumns",$NoColumns);
$smarty->assign("DriverStatus",$DriverStatus);

require_once ROOT . '/db/v4_AuthUsers.class.php';

$au = new v4_AuthUsers();

require_once ROOT . '/db/db.class.php';
require_once ROOT . '/db/v4_OrdersMaster.class.php';
require_once ROOT . '/db/v4_OrderDetails.class.php';	
require_once ROOT . '/db/v4_OrderExtras.class.php';
require_once ROOT . '/db/v4_Places.class.php';
require_once ROOT . '/db/v4_Routes.class.php';
require_once ROOT . '/db/v4_OrderLog.class.php';

$db = new DataBaseMysql();
$om = new v4_OrdersMaster();
$od = new v4_OrderDetails();
$d2 = new v4_OrderDetails();
$oe = new v4_OrderExtras();
$op = new v4_Places();
$or = new v4_Routes();
$ol = new v4_OrderLog();


$ordersArray = array();
$sdArray = array();
$sddArray = array();


$BsColumnWidth = 12 / $NoColumns;
$smarty->assign("BsColumnWidth",$BsColumnWidth);
// Da li je interno
$au->getRow($_SESSION['UseDriverID']);
if($au->ContractFile == 'inter'){
	$inter = true;
}else{
	$inter = false;
}
$smarty->assign("inter",$inter);
// promjena pickup time
$whereL = " WHERE Description LIKE '%PickupTime%'";
$olKeys = $ol->getKeysBy('ID', 'DESC', $whereL);
foreach ($olKeys as $olid) {
	$ol->getRow($olid);	
	$olKeys2[]=$ol->getDetailsID();
	}

// Svi transferi za hvatanje other transfer
$details=array();
// za proveru return transfer-a
$q2 = "SELECT DetailsID,OrderID FROM v4_OrderDetails ORDER BY DetailsID DESC" ;
$r2 = $db->RunQuery($q2);
while ($t2 = $r2->fetch_object()) {
	$row_array=array();
	$row_array['DetailsID']=$t2->DetailsID; 
	$row_array['OrderID']=$t2->OrderID; 
	
	$details[]=$row_array;
}

// dobavi sve transfere za odabrani datum za trenutnog vlasnika timetable-a
$q = "
SELECT *
	FROM v4_OrderDetails, v4_OrdersMaster, v4_AuthUsers 
	WHERE 
		v4_OrderDetails.DriverID = " . $_SESSION['UseDriverID']; 
$q .= " AND PickupDate >= '" . $DateFrom . "'"; 
$q .= " AND PickupDate <= '" . $DateTo . "'";
$q .= " AND TransferStatus < '6'";
$q .= " AND TransferStatus != '4'"; 
if ($DriverStatus==2) $q .= "	AND DriverConfStatus > 2 ";
if ($DriverStatus==1) $q .= "	AND DriverConfStatus < 3 ";	
$q .= " AND AuthUserID=UserID ";
$q .= " AND MorderID=OrderID ";
$q .= " ORDER BY DetailsID ASC";
$r = $db->RunQuery($q);
$subDArray = array();

// $t
while ($t = $r->fetch_object()) {
	require("oneTransfer.php"); // oneTransfer.php ===========================================================================
}
$subDArray = array_unique($subDArray); // ostavi samo jedinstvene subdrivere u nizu
$sdd="";
foreach ($subDArray as $sd) {
	$sdd.=$sd.",";
}
$sdd = substr($sdd,0,strlen($sdd)-1);

// dobavi vozace od trenutnog vlasnika timetable-a, slozi ih u sdArray sa podacima
$q = "SELECT * FROM v4_AuthUsers";
$q .= "	WHERE DriverID = " . $_SESSION['UseDriverID']; 
//$q .= " WHERE AuthUserID in (".$sdd.") ORDER BY AuthUserRealName ASC";
$r = $db->RunQuery($q);


while ($d = $r->fetch_object()) {
	if (in_array($d->AuthUserID,$subDArray)) {
		$row = array();
		$row['DriverID'] = $d->AuthUserID;
		$row['DriverName'] = $d->AuthUserRealName;
		$row['Active'] = $d->Active;
		$row['Mob'] = $d->AuthUserMob;
		$sdArray[] = $row;
	}	
	if ($d->Active==1) {
		$row = array();
		$row['DriverID'] = $d->AuthUserID;
		$row['DriverName'] = $d->AuthUserRealName;
		$row['Mob'] = $d->AuthUserMob;		
		//ovde izvuci vozcevo vozilo
		$row['DriverCar'] = "assosVehicle";
		$sddArray[] = $row;
	}
}

$smarty->assign('ordersArray',$ordersArray);
$smarty->assign('sdArray',$sdArray);
$smarty->assign('sddArray',$sddArray);



function getOtherTransferIDArray ($DetailsID,$details) {
	$key = array_search($DetailsID, array_column($details, 'DetailsID'));
	$oid=$details[$key]['OrderID'];
	$keys = array_keys(array_column($details, 'OrderID'),$oid);
	$otherDetailsID=null;
	if (count($keys) == 2) {
		if ($DetailsID == $details[$keys[0]]['DetailsID']) {
			$otherDetailsID=$details[$keys[1]]['DetailsID'];
		}
		else if ($DetailsID == $details[$keys[1]]['DetailsID']) {
			$otherDetailsID=$details[$keys[0]]['DetailsID'];
		}		
	}	
	return $otherDetailsID;
}


# Pretvaranje formata datuma
function YMD_to_DMY ($date) {
	$elementi = explode ('-', $date);
	$new_date = $elementi[2] . '.' . $elementi[1] . '.' . $elementi[0];
	return $new_date;
}


?>

