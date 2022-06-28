<?
/*
	napomena za Surcharges:
	0 - nema
	1 - global + OwnerID
	2 - route + OwnerID + RouteID
	3 - vehicle + OwnerID + VehicleID
	4 - service + OwnerID + ServiceID

	Podatak se nalazi u SurCategory polju, plus ova ostala polja za lookup.

	Logika je:
	- ako je u Services SurCategory 0,
	- pogledaj u Vehicles. Ako je i tamo nula,
	- pogledaj u Routes. Ako je i tamo nula,
	- pogledaj u SurGlobal

	Ovo bi trebalo pametnije rijesit.
	Kod odabira surcharges bi trebalo u sve upisat kategoriju.
	Npr. ako vozac na profilu stavi Global, onda bi u sva njegova vozila, rute i services
	trebalo odmah upisat 1.
	Ako kasnije na neku rutu stavi Route surcharges, onda bi u sve Services za tu rutu
	trebalo upisat 2.
	Ako stavi samo za neko vozilo, onda bi u sve Services za to vozilo trebalo stavit 3.
	Ako stavi samo za jednu uslugu, onda tu ide 4.

	Tako bi se odmah moglo znat di triba gledat.

	Ako nesto kasnije promijeni, postupak bi treba bit isti.
	Npr. ako za neko vozilo stavi da nema surcharges, a prije je bilo,
	onda bi za sve Services od toga vozila trebalo stavit 0, ako je prije bilo 3.
	Ako je bilo 4, onda ne dirat.


*/

error_reporting(E_ALL);
define("DEBUG", 0);

@session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/LoadLanguage.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/f2/f.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_Services.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_Routes.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_DriverRoutes.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_AuthUsers.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_Vehicles.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_VehicleTypes.class.php';


//echo '<pre>'; print_r($_POST); echo '</pre>';
$db = new DataBaseMysql();

$s  = new v4_Services();
$r  = new v4_Routes();
$dr = new v4_DriverRoutes();
$au = new v4_AuthUsers();
$v  = new v4_Vehicles();
$vt = new v4_VehicleTypes();

$RouteID		= $_REQUEST['RouteID'];
$transferDate   = $_REQUEST['TransferDate'];
$transferTime   = $_REQUEST['TransferTime'];

$returnDate     = '';
$returnTime     = '';


// Izlazni podaci koje koriste skripte za display
$cars = array(); // podaci o vozilima
$drivers = array(); // podaci o vozacima
$carsErrorMessage = array(); // greske

// ODAVDE KRECE

        $drWhere = "WHERE RouteID = '".$RouteID."' AND Active = '1'";
        // check for drivers for the route 
        $driverRouteKeys = $dr->getKeysBy('OwnerID', "ASC", $drWhere);
        if (count($driverRouteKeys) == 0) {
            //$carsErrorMessage['title'] = $NO_DRIVERS;
            //$carsErrorMessage['text'] = $NO_DRIVERS_EXT;
        }
        else {

            // ako su pronadjene DriverRoutes, obradi svaku
            foreach($driverRouteKeys as $dri => $rowId) {
                
                $dr->getRow($rowId);
                //if($dr->getRow($rowId)===false) {
                //    break;
                //}

                if($dr->getFromID() == $FromID  and $dr->getOneToTwo() == '0') break;
                if($dr->getFromID() == $ToID  and $dr->getTwoToOne() == '0') break;

                $OwnerID = $dr->getOwnerID();

                if($au->getRow($OwnerID)===false) break;

                // Driver Profiles iz v4_AuthUsers
                //$Driver = $au->getAuthUserName();
                $DriverCompany = $au->getAuthUserCompany();

                // ovo je sranje, jer se izgleda ne moze vjerovati getRow funkciji
                // ona ne vraca false ako ne nadje pravi slog!
                // zato ova usporedba
                //if($OwnerID !== $au->getAuthUserID()) break;



                // check for Services
                $serviceKeys = $s->getKeysBy("ServiceID", "ASC", "WHERE RouteID = {$RouteID} AND OwnerID = {$OwnerID} AND Active = '1'");

                if(count($serviceKeys) == 0) { // not found
                    $carsErrorMessage['title'] = $NO_VEHICLES;
                    $carsErrorMessage['text'] =  $NO_VEHICLES_EXT;
                }
                else { // found
                    foreach($serviceKeys as $si => $sId) {
                        $s->getRow($sId);
                        $ServiceID = $s->getServiceID();

                        $Correction= $s->getCorrection();

                        $v->getRow($s->getVehicleID());

                        //$VehicleName  = $v->getVehicleName();
                        $VehicleName    = getVehicleTypeName( $v->getVehicleTypeID() );
                        $VehicleTypeID  = $v->getVehicleTypeID();
                        $VehicleCapacity= $v->getVehicleCapacity();
                        $WiFi           = $v->getAirCondition();

                        $VehicleID      = $v->getVehicleID();
                        $ReturnDiscount = $v->getReturnDiscount();

                        $vt->getRow($VehicleTypeID);
                        $VehicleClass   = $vt->getVehicleClass();
                        $VehicleDescription = getVehicleDescription( $v->getVehicleTypeID() ); // do 2017-11-23 je bilo $vt->getDescription(); -R


                        $VehicleImage = '';

                        /*

                            Ovdje upada dio sa izracunavanjem cijena ovisno o:
                            - return discount
                            - danu u tjednu
                            - sezoni
                            - je li nocna voznja

                            Sve te faktore treba prikazati kupcu kao dodatak na osnovnu cijenu.
                            Ako je Return transfer, Surcharges vraca zbrojene dodatke za oba transfera!

                        */
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

 //RETURN NE TRIBA
/*
                            if($returnTransfer) {
                                // vozaceva osnovna cijena za jedan smjer
                                $DriversPrice = $s->getServicePrice1();

                                // izracun popusta na Return transfer
                                $DiscountPrice = $DriversPrice - ($DriversPrice * $ReturnDiscount / 100);

                                // finalna cijena vozaca za Return transfer sa svim odbicima i dodacima
                                $DriversPrice = $DriversPrice + $DiscountPrice + $addToPrice;

                                // OneWay Price
                                $OneWayPrice = ($DriversPrice) / 2;
                                $OneWayPrice = calculateBasePrice($OneWayPrice, $s->getOwnerID(), $VehicleClass);

                                // na finalnu cijenu vozaca dodaj proviziju
                                $FinalPrice = calculateBasePrice($DriversPrice, $s->getOwnerID(), $VehicleClass);
                            }

// SVE JE ONE_WAY
                            else {
*/
                                // inace je jedan smjer, pa dodaci idu odmah
                                $DriversPrice = $s->getServicePrice1();
                                $BasePrice = calculateBasePrice($DriversPrice, $s->getOwnerID(), $VehicleClass);
                                $DriversPrice = $DriversPrice + $addToPrice;
                                $OneWayPrice = calculateBasePrice($DriversPrice, $s->getOwnerID(), $VehicleClass);
                                $FinalPrice = $OneWayPrice;
//                            }

                            // zaokruzenje cijena
                            //$FinalPrice = nf( round($FinalPrice,0,PHP_ROUND_HALF_UP) );
                            $FinalPrice = nf( round($FinalPrice,2) );

                        /*
                        ** KRAJ OBRADE CIJENA
                        */

                            // premjesteno od dole, tako da se upoce ne uzimaju u obzir podaci
                            // ako vozac nije aktivan ili ne vozi odredjene datume
                            $okToAdd = true;

                            # nemoj dodati cijene ako driver nije Active!!!
                            if($au->getActive() == 0) $okToAdd = false;

                            if(isVehicleOffDuty($VehicleID, $transferDate)) $okToAdd = false;

                            if($returnDate != '') {
                                if(isVehicleOffDuty($VehicleID, $returnDate)) $okToAdd = false;
                            }



                        // sortiranje top drivera ispred ostalih
                        // kako mora biti sortirano i po cijeni
                        // onda se cijena mnozi sa 11-rating (tako da ako je rating 10, mnozi se sa 1)
                        // znaci ako je rating veci, rating cijena je manja
                        // pa vozac izlazi ispred
                        //$Rating = $FinalPrice * (11 - ShowRatings($OwnerID));

                        // ako je vozilo dovoljno veliko,
                        // spremi podatke i profil
                        if( $okToAdd == true) {
                            //logit('Radim: ' . $OwnerID);
/*
                            // Za isti tip vozila prikazi samo najpovoljniju cijenu
                            $keyFound = '';
                            foreach($cars as $key => $niz) {
                                //$logVar = 'niz '.$niz['VehicleTypeID'] . '-' . $niz['FinalPrice'];

                                if($niz['VehicleTypeID'] == $VehicleTypeID and $niz['FinalPrice'] > 0) {
                                    $keyFound = $key;

                                    break;
                                }
                            }




                            if( $keyFound !== '') {

                                if( count($cars) > 0) {

                                    if($FinalPrice > 0) {
                                        if( $cars[$keyFound]['VehicleTypeID'] == $VehicleTypeID) {

                                            //logit($cars[$keyFound]['VehicleTypeID'].'|'. $VehicleTypeID);
                                            //logit($FinalPrice);

                                            if($cars[$keyFound]['FinalPrice'] > $FinalPrice ) {// izbaci skuplje
                                                //logit('Izbaceno: ' . $cars[$keyFound]['BasePrice']);
                                                unset($cars[$keyFound]);
                                                $okToAdd = true;

                                                //echo '<br> Adding: '.$VehicleTypeID . ' ' . $FinalPrice;
                                            } else if($FinalPrice > $cars[$keyFound]['FinalPrice']) {
                                                //unset($cars[$keyFound]);
                                                $okToAdd = false;
                                                //echo '<br> NotAdding: '.$VehicleTypeID . ' ' . $FinalPrice;
                                                //logit('Izbaceno-prvi');

                                            } else if($FinalPrice == $cars[$keyFound]['FinalPrice']) {
                                                //unset($cars[$keyFound]);
                                                $okToAdd = false;
                                                //echo '<br> NotAdding: '.$VehicleTypeID . ' ' . $FinalPrice;
                                                //logit('Izbaceno-drugi');
                                            }
                                        } else {
                                            $okToAdd = true;
                                            //echo '<br> Adding: '.$VehicleTypeID . ' ' . $FinalPrice;
                                        }
                                    } else { $okToAdd = false;}
                                }
                            }

*/


                            if($FinalPrice == 0) $okToAdd = false;

                            if($okToAdd) {
                                $sortHelpClass      = 1000+$VehicleClass;
                                $sortHelpCapacity   = 1000+$VehicleCapacity;
                                $sortBy = $sortHelpCapacity.$sortHelpClass;

                                $cars[] = array(
                                    'RouteID'           => $RouteID,
                                    'OwnerID'           => $OwnerID,
                                    'DriverCompany'     => $DriverCompany,
                                    'ProfileImage'      => $ProfileImage,
                                    'ServiceID'         => $ServiceID,
                                    'VehicleID'         => $VehicleID,
                                    'VehicleTypeID'     => $VehicleTypeID,
                                    'VehicleName'       => $VehicleName,
                                    'VehicleImage'      => $VehicleImage,
                                    'VehicleCapacity'   => $VehicleCapacity,
                                    'VehicleClass'      => $VehicleClass,
                                    'WiFi'              => $WiFi,
                                    'VehicleSort'       => $sortBy,
                                    'VehicleDescription'=> $VehicleDescription,
                                    'FinalPrice'        => nf($FinalPrice), // cijena sa svim dodacima
                                    'DriversPrice'      => nf($DriversPrice), // cista vozacka cijena
                                    'OneWayPrice'       => nf($OneWayPrice), // cijena za jedan smjer sa dodacima
                                    'Rating'            => $Rating,
                                    'NightPrice'        => $sur['NightPrice'],
                                    'MonPrice'          => $sur['MonPrice'],
                                    'TuePrice'          => $sur['TuePrice'],
                                    'WedPrice'          => $sur['WedPrice'],
                                    'ThuPrice'          => $sur['ThuPrice'],
                                    'FriPrice'          => $sur['FriPrice'],
                                    'SatPrice'          => $sur['SatPrice'],
                                    'SunPrice'          => $sur['SunPrice'],
                                    'S1Price'           => $sur['S1Price'],
                                    'S2Price'           => $sur['S2Price'],
                                    'S3Price'           => $sur['S3Price'],
                                    'S4Price'           => $sur['S4Price'],
                                    'S5Price'           => $sur['S5Price'],
                                    'S6Price'           => $sur['S6Price'],
                                    'S7Price'           => $sur['S7Price'],
                                    'S8Price'           => $sur['S8Price'],
                                    'S9Price'           => $sur['S9Price'],
                                    'S10Price'          => $sur['S10Price'],
                                    'Km'                => $Km,
                                    'Duration'          => $Duration,
                                    'BasePrice'         => nf( round($BasePrice,2) )
                                );

                                // ako Driver ima odgovarajuce vozilo,
                                // popuni podatke o profilu
                                // Driver Profiles iz v4_AuthUsers
                                $drivers[$OwnerID] = array(
                                            'DriverCompany'     => $DriverCompany,
                                            'ProfileImage'      => $ProfileImage,
                                            'RealName'          => $au->getAuthUserRealName(),
                                            'Company'           => $au->getAuthUserCompany(),
                                            'Address'           => $au->getAuthCoAddress()
                                );


                            }
                        }

                    } // end foreach services

                }// end else

            } // end foreach DriverRoutes

        }



//echo '<pre>'; print_r($cars); echo '</pre>';

if(count($cars) == 0) {
    $carsErrorMessage['title'] = $NO_VEHICLES;
    $carsErrorMessage['text'] =  $TOO_SMALL;
} else {

    $carsErrorMessage = array(); // reset arraya za greske

    $sort1 = subval_sort($cars,'VehicleSort');
    $sort2 = subval_sort($cars,'FinalPrice');

    $bestPrice = $sort2[0]['ServiceID'];

    $cars = array();

    $cars[] = $sort2[0];

    foreach($sort1 as $key => $arr) {
        if($sort1[$key]['ServiceID'] != $bestPrice) {
            $cars[] = $sort1[$key];
        }
    }

    //@Blogit($cars);
}


$cars = json_encode($cars);
echo $_GET['callback'] . '(' . $cars. ')';



function ShowRatings($userId) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_Ratings.class.php';

    $r = new v4_Ratings();

    $r->getRow($userId);

    if($r->getVotes() > 0)  return $r->getAverage() / $r->getVotes();
    else return '0';


}


// Dodavanje dogovorene provizije na osnovnu cijenu
function calculateBasePrice($price, $ownerid, $VehicleClass = 1) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
    $db = new DataBaseMysql();

        // ako je u decimalama, zaokruzi na cijeli broj
        // npr. 299.20 treba zaokruziti na 299 radi toga sto su usporedne cijene na cijeli broj
        // 100-299, pa onda 300-9999
        // pa ako se ide usporediti onda je 299.20 vece od 299, ali je i manje od 300
        // i onda nece upasti ni u jedan if
        $priceR = round($price, 0, PHP_ROUND_HALF_DOWN); 

        # Driver
        $q = "SELECT * FROM v4_AuthUsers
                    WHERE AuthUserID = '" .$ownerid."'
                    ";
        $w = $db->RunQuery($q);

        $d = mysqli_fetch_object($w);

        if($d->AuthUserID == $ownerid) {

            // STANDARD CLASS
            if($VehicleClass < 11) {
                if      ($priceR >= $d->R1Low and $priceR <= $d->R1Hi) return $price + ($price*$d->R1Percent / 100);
                else if ($priceR >= $d->R2Low and $priceR <= $d->R2Hi) return $price + ($price*$d->R2Percent / 100);
                else if ($priceR >= $d->R3Low and $priceR <= $d->R3Hi) return $price + ($price*$d->R3Percent / 100);
                else return $price;
            }

            // PREMIUM CLASS
            if($VehicleClass >= 11 and $VehicleClass < 21) {
                if      ($priceR >= $d->PR1Low and $priceR <= $d->PR1Hi) return $price + ($price*$d->PR1Percent / 100);
                else if ($priceR >= $d->PR2Low and $priceR <= $d->PR2Hi) return $price + ($price*$d->PR2Percent / 100);
                else if ($priceR >= $d->PR3Low and $priceR <= $d->PR3Hi) return $price + ($price*$d->PR3Percent / 100);
                else return $price;
            }

            // FIRST CLASS
            if($VehicleClass >= 21) {
                if      ($priceR >= $d->FR1Low and $priceR <= $d->FR1Hi) return $price + ($price*$d->FR1Percent / 100);
                else if ($priceR >= $d->FR2Low and $priceR <= $d->FR2Hi) return $price + ($price*$d->FR2Percent / 100);
                else if ($priceR >= $d->FR3Low and $priceR <= $d->FR3Hi) return $price + ($price*$d->FR3Percent / 100);
                else return $price;
            }

        }

        return '0';


}

function vehicleTypeName($vehicleTypeID) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
    $db = new DataBaseMysql();

    $w = $db->RunQuery("SELECT * FROM v4_VehicleTypes WHERE VehicleTypeID = '{$vehicleTypeID}'");
    $v = $w->fetch_object();

    return $v->VehicleTypeName;
}

function isVehicleOffDuty($vehicleID, $transferDate) {
    $cnt = 0;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
    $db = new DataBaseMysql();

    $r = $db->RunQuery("SELECT * FROM v4_OffDuty WHERE VehicleID = '".$vehicleID."' ORDER BY ID ASC");

    while($o = $r->fetch_object()) {

        if( isInDateRange($o->StartDate, $o->EndDate, $transferDate) ) {

            $cnt += 1;
        }

    }

    if($cnt >= 1) return true;
    else return false;
}

