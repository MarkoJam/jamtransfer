<?
header('Content-Type: text/javascript; charset=UTF-8');
require_once 'Initial.php';

@session_start();

# sastavi filter - posalji ga $_REQUEST-om
# sastavi filter - posalji ga $_REQUEST-om
if (isset($selectactive)) {
	if (!isset($_REQUEST['Active']) or $_REQUEST['Active'] == 99) {
		$filter .= "  AND ".$selectactive." > -1 ";
	}
	else {
		$filter .= "  AND ".$selectactive." = " . $_REQUEST['Active'] ;
	}
}


$page 		= $_REQUEST['page'];
$length 	= $_REQUEST['length'];
$sortOrder 	= $_REQUEST['sortOrder'];

$start = ($page * $length) - $length;

if ($length > 0) {
	$limit = ' LIMIT '. $start . ','. $length;
}
else $limit = '';

if(empty($sortOrder)) $sortOrder = 'ASC';


# init vars
$out = array();
$flds = array();

# kombinacija where i filtera
$DB_Where = " " . $_REQUEST['where'];
$DB_Where .= $filter;


$DB_Where .= " AND OwnerID=".$_SESSION['UseDriverID'];

 if (isset($_REQUEST['TunnelPassID']) && $_REQUEST['TunnelPassID']>0) $DB_Where .= " AND TunnelPassID=".$_REQUEST['TunnelPassID'];

# dodavanje search parametra u qry
# DB_Where sad ima sve potrebno za qry
if ( $_REQUEST['Search'] != "" )
{
	$DB_Where .= " AND (";

	for ( $i=0 ; $i< count($aColumns) ; $i++ )
	{
		# If column name exists
		if ($aColumns[$i] != " ")
		$DB_Where .= $aColumns[$i]." LIKE '%"
		.$db->myreal_escape_string( $_REQUEST['Search'] )."%' OR ";
	}
	$DB_Where = substr_replace( $DB_Where, "", -3 );
	$DB_Where .= ')';
}
$dbTotalRecords = $db->getKeysBy($ItemName . $sortOrder, '',$DB_Where);
// prazan red za eventualni unos
$db->getRow(0);	
$detailFlds = $db->fieldValues();
$out[] = $detailFlds; 
if (isset($_REQUEST['TunnelPassID']) && $_REQUEST['TunnelPassID']>0) {
	$db->getRow(0);	
	$detailFlds = $db->fieldValues();
	//$v->getRow( $_REQUEST['TunnelPassID'] );
	$detailFlds["TunnelPassID"] = $_REQUEST['TunnelPassID'];	
	$out[] = $detailFlds; 
}

# test za LIMIT - trebalo bi ga iskoristiti za pagination! 'asc' . ' LIMIT 0,50'
$dbk = $db->getKeysBy($ItemName . $sortOrder, '' . $limit , $DB_Where);

if (count($dbk) != 0) {
    foreach ($dbk as $nn => $key)
    {
    	$db->getRow($key);
		// ako treba neki lookup, onda to ovdje
		# get all fields and values
		$detailFlds = $db->fieldValues();
		// ako postoji neko custom polje, onda to ovdje.
		// npr. $detailFlds["AuthLevelName"] = $nekaDrugaDB->getAuthLevelName().' nesto';
		$out[] = $detailFlds;    	
    }
}
# send output back
$output = array(
'recordsTotal' => count($dbTotalRecords),
'data' =>$out
);
echo $_GET['callback'] . '(' . json_encode($output) . ')';	