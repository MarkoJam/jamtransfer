<?
	require_once '../../config.php';
	date_default_timezone_set('Europe/Paris');	
	$datetime=date('Y-m-d H:i:s');
	if ($_REQUEST['SubDriverID']==0) {
		$q1 = "SELECT `AssignSDID` FROM `v4_SubVehicles` WHERE `VehicleID`=".$_REQUEST['SubVehicleID'];
		$r = $db->RunQuery($q1);
		$qR = $r->fetch_object();
		$sdid=$qR->AssignSDID;
		$status=0;
	}	else {
		$sdid=$_REQUEST['SubDriverID'];
		$status=1;
	}	
	$q2 = "UPDATE `v4_SubVehicles` SET `AssignSDID`=".$_REQUEST['SubDriverID'].",`AssignTime`='".$datetime."' WHERE VehicleID=".$_REQUEST['SubVehicleID'];		
	$r = $db->RunQuery($q2);	
	$q3 = "INSERT INTO `v4_SubVehiclesAH`(`VehicleID`, `AssignSDID`, `AssignTime`, `Status`) VALUES (".$_REQUEST['SubVehicleID'].",'".$sdid."','".$datetime."','".$status."')";
	$r = $db->RunQuery($q3);
	
	// slanje whatsapp poruka
	require_once ROOT . '/db/v4_SubVehicles.class.php';
	require_once ROOT . '/db/v4_AuthUsers.class.php';
	$sv = new v4_SubVehicles();
	$au = new v4_AuthUsers();	
	$au->getRow($_REQUEST['SubDriverID']);
	$sv->getRow($_REQUEST['SubVehicleID']);
	$phone=$au->getAuthUserMob();
	$message="You have been assigned a vehicle: ".$sv->getVehicleDescription() .". Login on https://wis.jamtransfer.com/.";
	send_whatsapp_message($phone,$message);	
	