<?
header('Content-Type: text/javascript; charset=UTF-8');
error_reporting(E_PARSE);
 
	# init libs
	require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_Request.class.php';


	# init vars
	$out = array();


	# init class
	$db = new v4_Request();


	# filters

	$ID = $_REQUEST['ID'];

	# Details  red
	$db->getRow($ID);


	# get fields and values
	$detailFlds = $db->fieldValues();


    # remove slashes 
    foreach ($detailFlds as $key=>$value) {
        $detailFlds[$key] = stripslashes($value);
    }


	$out[] = $detailFlds;

	# send output back
	$output = json_encode($out);
	echo $_GET['callback'] . '(' . $output . ')';
	
