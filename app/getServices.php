<?
require_once "../config.php";
require_once ROOT . '/db/v4_AuthUsers.class.php';
$au = new v4_AuthUsers();
$pass=false;
$agentKeys = $au->getKeysBy('AuthUserID','asc',"WHERE AuthLevelID=2 and Active=1");
foreach($agentKeys as $ki => $id) {
	$au->getRow($id);
	if ($_REQUEST['code']==md5($au->getAuthUserPass())) {
		$pass=true;
		$userID=$au->getAuthUserID();
		break;
	}	
}
if($pass) {
	require_once ROOT . '/db/v4_Services.class.php';
	require_once ROOT . '/db/v4_Routes.class.php';
	require_once ROOT . '/db/v4_DriverRoutes.class.php';
	require_once ROOT . '/db/v4_Vehicles.class.php';
	require_once ROOT . '/db/v4_VehicleTypes.class.php';
	$s 	= new v4_Services();
	$r 	= new v4_Routes();
	$dr = new v4_DriverRoutes();
	$v	= new v4_Vehicles();
	$vt = new v4_VehicleTypes();

	// Request u varijable
	$FromID	= $_REQUEST['FromID'];
	$ToID 	= $_REQUEST['ToID'];
	$PaxNo	= $_REQUEST['PaxNo'];
	$transferDate 	= $_REQUEST['transferDate'];
	$transferTime 	= $_REQUEST['transferTime'];

	if($_REQUEST['returnTransfer'] == 1) {
		$returnDate		= $_REQUEST['returnDate'];
		$returnTime		= $_REQUEST['returnTime'];
		$returnTransfer = $_REQUEST['returnTransfer'];
	}
	else {
		$returnTransfer = 0;
		$returnDate = '';
		$returnTime = '';
	}
	// Izlazni podaci koje koriste skripte za display 
	$cars = array(); // podaci o vozilima
	$drivers = array(); // podaci o vozacima
	# check if such route exists
	$routesKeys = $r->getKeysBy('RouteID','asc',"WHERE (FromID = {$FromID} AND ToID = {$ToID}) OR (FromID = {$ToID} AND ToID = {$FromID})");
	if(count($routesKeys) > 0) {
		foreach($routesKeys as $ki => $id) {
		$r->getRow($id);
        $drWhere = "WHERE RouteID = {$id} AND Active = '1'";
        // check for drivers for the route
        $driverRouteKeys = $dr->getKeysBy('OwnerID', "ASC", $drWhere);
        if (count($driverRouteKeys) > 0) {
            foreach($driverRouteKeys as $dri => $rowId) {
                if($dr->getRow($rowId)===false) continue;
                if($dr->getFromID() == $FromID  and $dr->getOneToTwo() == '0') continue;
                if($dr->getFromID() == $ToID  and $dr->getTwoToOne() == '0') continue;
				if ($returnTransfer) {
					if ($dr->getToID() == $FromID and $dr->getOneToTwo() == '0') continue;
					if ($dr->getToID() == $ToID and $dr->getTwoToOne() == '0') continue;
				}				
                $OwnerID = $dr->getOwnerID();
                if($au->getRow($OwnerID)===false) continue;

                $Driver = $au->getAuthUserName();
                $DriverCompany = $au->getAuthUserCompany();
		
                $serviceKeys = $s->getKeysBy("ServiceID", "ASC", "WHERE RouteID = {$id} AND OwnerID = {$OwnerID} AND Active = '1'");
                if(count($serviceKeys) > 0) { 
                    foreach($serviceKeys as $si => $sId) {
                        $s->getRow($sId);
                        $ServiceID = $s->getServiceID();
                        $v->getRow($s->getVehicleID());
                        //$VehicleName  = $v->getVehicleName();
                        $VehicleName    = getVehicleTypeName( $v->getVehicleTypeID() );
                        $VehicleTypeID  = $v->getVehicleTypeID();
                        $VehicleCapacity= $v->getVehicleCapacity();
                        $VehicleID      = $v->getVehicleID();
                        $ReturnDiscount = $v->getReturnDiscount();
                        $vt->getRow($VehicleTypeID);
                        $VehicleClass   = $vt->getVehicleClass();
                        $VehicleDescription = getVehicleDescription( $v->getVehicleTypeID() ); // do 2017-11-23 je bilo $vt->getDescription(); -R

                            $SurCategory    = $s->getSurCategory();
                            $DRSurCategory  = $dr->getSurCategory();
                            $VSurCategory   = $v->getSurCategory();
                            $sur = array();
                            $sur = Surcharges($OwnerID, $SurCategory, $s->getServicePrice1(),
                                              $transferDate, $transferTime,
                                              $returnDate, $returnTime,
                                              $dr->getID(), $VehicleID, $ServiceID,
                                              $VSurCategory, $DRSurCategory
                                              );
                            $addToPrice =   $sur['MonPrice'] +
                                            $sur['TuePrice'] +
                                            $sur['WedPrice'] +
                                            $sur['ThuPrice'] +
                                            $sur['FriPrice'] +
                                            $sur['SatPrice'] +
                                            $sur['SunPrice'] +
                                            $sur['S1Price'] +
                                            $sur['S2Price'] +
                                            $sur['S3Price'] +
                                            $sur['S4Price'] +
                                            $sur['S5Price'] +
                                            $sur['S6Price'] +
                                            $sur['S7Price'] +
                                            $sur['S8Price'] +
                                            $sur['S9Price'] +
                                            $sur['S10Price'] +
                                            $sur['NightPrice'];
                            if($returnTransfer==1) {
                                $DriversPrice = $s->getServicePrice1();
								$DiscountPrice = $DriversPrice - ($DriversPrice * $ReturnDiscount / 100);
                                $DriversPrice = $DriversPrice + $DiscountPrice + $addToPrice;
                                $specialDatesPrice = calculateSpecialDates($OwnerID,$DriversPrice/2,$transferDate, $transferTime, $returnDate, $returnTime);
                                $DriversPrice = $DriversPrice + $specialDatesPrice;
                                $OneWayPrice = ($DriversPrice) / 2;
                                $OneWayPrice = calculateBasePrice($OneWayPrice, $s->getOwnerID(), $VehicleClass);
                                $FinalPrice = calculateBasePrice($DriversPrice, $s->getOwnerID(), $VehicleClass);
								$FinalPrice = nf( round($FinalPrice/2,2) )*2;
                            }
                            else {
                                $DriversPrice = $s->getServicePrice1();
                                $DriversPrice = $DriversPrice + $addToPrice;	
                                $specialDatesPrice = calculateSpecialDates($OwnerID,$DriversPrice,$transferDate, $transferTime);

                                $DriversPrice = $DriversPrice + $specialDatesPrice;
                                $OneWayPrice = calculateBasePrice($DriversPrice, $s->getOwnerID(), $VehicleClass);
                                $FinalPrice = $OneWayPrice;
                            }
                            // zaokruzenje cijena
                            $FinalPrice = nf( round($FinalPrice,2) );

                            $okToAdd = true;
                            if($au->getActive() == 0) $okToAdd = false;
                            if($s->getServicePrice1() == 0) $okToAdd = false;
                            if(isVehicleOffDuty($VehicleID, $transferDate, $transferTime)) $okToAdd = false;
                            if($returnDate != '') {
                                if(isVehicleOffDuty($VehicleID, $returnDate, $returnTime)) $okToAdd = false;
                            }
							if($VehicleCapacity >= $PaxNo and $okToAdd == true) {
								if($FinalPrice == 0) $okToAdd = false;
								if($okToAdd) {
									$cars[$ServiceID] = array(
										'VehicleName'       => $VehicleName,
										'VehicleCapacity'   => $VehicleCapacity,
										'FinalPrice'        => nf($FinalPrice) 
									);
								}
							}
						} // end foreach services
					}// end else
				} // end foreach DriverRoutes
			}
		}
	}
	echo json_encode($cars);
}
// Dodavanje dogovorene provizije na osnovnu cijenu
function calculateBasePrice($price, $ownerid) {
	global $db;
		# Driver
		$q = "SELECT * FROM v4_AuthUsers
					WHERE AuthUserID = '" .$ownerid."' 
					";
		$w = $db->RunQuery($q);
		$d = mysqli_fetch_object($w);
		if($d->AuthUserID == $ownerid) {
		if ($price >= $d->R1Low and $price <= $d->R1Hi) return $price + ($price*$d->R1Percent / 100);
		else if ($price >= $d->R2Low and $price <= $d->R2Hi) return $price + ($price*$d->R2Percent / 100);
		else if ($price >= $d->R3Low and $price <= $d->R3Hi) return $price + ($price*$d->R3Percent / 100);
		else return $price;
		}
		return '0';	
}

function isVehicleOffDuty($vehicleID, $transferDate, $transferTime) {
    $cnt = 0;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
    $db = new DataBaseMysql();
    $r = $db->RunQuery("SELECT * FROM v4_OffDuty WHERE VehicleID = '".$vehicleID."' ORDER BY ID ASC");
    while($o = $r->fetch_object()) {
        if( inDateTimeRange($o->StartDate, $o->StartTime, $o->EndDate, $o->EndTime, $transferDate, $transferTime) ) {
            $cnt += 1;
        }
    }
    if($cnt >= 1) return true;
    else return false;
}

function calculateSpecialDates($OwnerID, $amount, $transferDate, $transferTime, $returnDate='', $returnTime='') {
    if( empty($OwnerID) or empty($amount) or empty($transferDate)  or empty($transferTime) ) return 0;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_SpecialDates.class.php';
    $sd = new v4_SpecialDates();
    $add1 = 0;
    $add2 = 0;
    $keys = $sd->getKeysBy("ID", "ASC", " WHERE OwnerID = '" . $OwnerID ."'");
    if( count($keys) > 0) {
        foreach($keys as $nn => $ID) {
            $sd->getRow($ID);

            if( inDateTimeRange($sd->getSpecialDate(), $sd->getStartTime(), $sd->getSpecialDate(), $sd->getEndTime(), $transferDate, $transferTime) ) {
                $add1 = nf($amount * $sd->getCorrectionPercent() / 100);
            }
            if($returnDate != '' and $returnTime != '') {
                if( inDateTimeRange($sd->getSpecialDate(), $sd->getStartTime(), $sd->getSpecialDate(), $sd->getEndTime(), $returnDate, $returnTime) ) {
                 $add2 = nf($amount * $sd->getCorrectionPercent() / 100);
                }
            }
        }
    }
    return $add1 + $add2;
}

