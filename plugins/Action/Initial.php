<?
require_once '../../config.php';
require_once ROOT . '/db/v4_Actions.class.php';
$db = new v4_Actions();
$keyName = 'ID';
$ItemName='Title ';
$type='Active'; 

#********************************
# kolone za koje je moguc Search 
# treba ih samo nabrojati ovdje
# Search ce ih sam pretraziti
#********************************
$aColumns = array(
	'Title' // dodaj ostala polja!
);