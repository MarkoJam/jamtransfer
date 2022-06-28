<?
	//require_once $_SERVER['DOCUMENT_ROOT'] . '/sessionThingy.php';
//session_start();
error_reporting(E_PARSE);

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/f2/f.php';

$db = new DataBaseMysql();

if(isset($_REQUEST['language'])) $_SESSION['language'] = $_REQUEST['language'];

$lang = Lang();

	// reset
	$_SESSION['CountryID'] = '';
	$_SESSION['FromID'] = '';
	$_SESSION['ToID'] = '';
	$_SESSION['fromName'] = '';
	$_SESSION['fromPlaces'] = array();

//$fromName = $_SESSION['lastElement'];
$fromName = $fID = $_REQUEST['fID'];

// Get from Cache
$filename = $_SERVER['DOCUMENT_ROOT'] . '/cache/toPlaces'.$fID.$lang.'.json';
$cachetime = 84600;

//if (file_exists($filename) && time() - $cachetime < filemtime($filename)) {
if (file_exists($filename)SRDAN	) {
	
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize($filename));
	fclose($handle);
	
	$noBrackets = str_replace('(','',$contents);
	$contents = str_replace(')','',$noBrackets);
	$jsonArray = json_decode($contents, true);

	unset($_SESSION['toPlaces']);
	foreach ($jsonArray as $key => $value)
	{
		$_SESSION['toPlaces'][$key] = $value;
	}
	
	$rewriteCache = false;
	
}
//*******************

else {
	#$qfid = "SELECT * FROM v4_Places WHERE PlaceID = '" . $fromName . "'"; 
	#$wfid = $db->RunQuery($qfid);
	#$fidObj = mysqli_fetch_object($wfid);

	#$fID = $fidObj->PlaceID;

	//$fID = $_SESSION['fromID'];

	# save variables for later usage
	//$_SESSION['fromName'] = $_SESSION['fromPlaces'][$fID];



	$places = array();

		# Routes for selected place
		$q1 = "SELECT FromID, ToID, RouteID FROM v4_Routes
					WHERE FromID = '{$fID}'
					OR    ToID   = '{$fID}'
					";
		$r1 = $db->RunQuery($q1);
	

		while($r = $r1->fetch_object())
		{
		
			# DriverRoutes - check if anyone drives from that Place
			$q2 = "SELECT DISTINCT RouteID FROM v4_DriverRoutes
						WHERE RouteID = '{$r->RouteID}' 
						";
			$w2 = $db->RunQuery($q2);
		
			# If does
			if  ($w2->num_rows > 0)
			{
			
				# Places in the Country
				$q  = "SELECT * FROM v4_Places ";
				$q .= " WHERE PlaceID  = ".$r->FromID;
				$q .= " OR    PlaceID  = ".$r->ToID;

				$w = $db->RunQuery($q);
			
				while ($p = $w->fetch_object())
				{
			
					if($p->PlaceActive == '1') {
						# Do not repeat the From name
						if ($p->PlaceID != $fID and $p->PlaceActive == '1') {
							# Add Place to array
							$pnLang = 'PlaceName'. Lang();
							if(strlen($pnLang) == 9) $pnLang = 'PlaceNameEN';
					
							$placeName = strtolower($p->$pnLang);
						
							// fix ako nema jezika
							if(empty($placeName)) $pnLang = 'PlaceNameEN';
							$placeName = strtolower($p->$pnLang);		

							# Add Place to array
							if (!in_array($places.'|'.$p->PlaceNameSEO,$toPlaces)) {
								$places[$p->PlaceID] = trim($placeName) . '|' . trim($p->PlaceNameSEO);
							}
						}
					}
				}
			}					
		}
	



	asort($places);
	unset($_SESSION['toPlaces']);
	
	$_SESSION['toPlaces'] = $places;
	unset($places);
	
	$rewriteCache = true;

}	
	
$res = array();

foreach ($_SESSION['toPlaces'] as $key => $value)
{
	# code...
	            $res[] = array(
                'id'=>$key,
              	'text'=>$value
            	);
}

$res = json_encode($res);
ob_start();
echo $_GET['callback'] . '(' . $res. ')';
ob_end_flush();

if ($rewriteCache) {
	// Save to Cache	
	$jsonToPlaces = json_encode($_SESSION['toPlaces']);
	//$filename = '../cache/toPlaces'.$fID.'.json';
	$handle = fopen($filename, "w");
	$contents = fwrite($handle, $jsonToPlaces);
	fclose($handle);
	// ************	
}
