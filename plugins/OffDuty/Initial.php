<?
require_once '../../config.php';
require_once ROOT . '/db/v4_OffDuty.class.php';
$db = new v4_OffDuty();
$dbT = new DataBaseMysql();
$keyName = 'ID';
$ItemName='StartDate DESC';
#********************************
# kolone za koje je moguc Search 
# treba ih samo nabrojati ovdje
# Search ce ih sam pretraziti
#********************************
$aColumns = array(
);