<?
require_once '../../config.php';
require_once ROOT . '/db/v4_ContractPrices.class.php';
$db = new v4_ContractPrices();
$keyName = 'ID';
$ItemName='ID ';
#********************************
# kolone za koje je moguc Search 
# treba ih samo nabrojati ovdje
# Search ce ih sam pretraziti
#********************************
$aColumns = array(
	'ID',
	'AgentID' // dodaj ostala polja!
);