<?
require_once ROOT . '/db/v4_Actions.class.php';
$db = new v4_Actions();
$keyName = 'ID';
$ItemName='DisplayOrder ';
#********************************
# kolone za koje je moguc Search 
# treba ih samo nabrojati ovdje
# Search ce ih sam pretraziti
#********************************
$aColumns = array(
	'Title' // dodaj ostala polja!
);