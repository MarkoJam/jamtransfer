<?
require_once '../../config.php';
require_once ROOT . '/db/v4_TunnelPassHistory.class.php';

$db = new v4_TunnelPassHistory();

$keyName = 'ID';
$ItemName='PassTime ';


#********************************
# kolone za koje je moguc Search 
# treba ih samo nabrojati ovdje
# Search ce ih sam pretraziti
#********************************
$aColumns = array(
	'PassTime' // dodaj ostala polja!
);