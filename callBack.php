<?
	//parametri glavne baze
	define("DB_HOST", "127.0.0.1");
	$DB_USER="jamtrans_cms";
	$DB_PASSWORD="~5%OuH{etSL)";
	$DB_NAME="jamtrans_touradria";
	require_once $_SERVER['DOCUMENT_ROOT'] . '/common/functions/f.php';
	$data = file_get_contents('php://input');
	$data=json_decode($data);
	$TempOrderKey=$data->order_number;
	require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_OrdersMasterTemp.class.php';
	$omt 	= new v4_OrdersMasterTemp();
	$omtKeys = $omt->getKeysBy('MOrderID', 'asc', " WHERE MOrderKey = '" .$TempOrderKey ."'");
	if( count($omtKeys) == 1 ) {
		$omt->getRow( $omtKeys[0] ); 
		$omt->setMPaymentStatus(1);
		$omt->setMCustomerIP(1);
	}	
	$temp = $omt->saveRow();
	// ovde ide deo za punjenje v4_OnlinePayments	
	require_once $_SERVER['DOCUMENT_ROOT'] . '/db/v4_OnlinePayments.class.php';
	$op 	= new v4_OnlinePayments();
	$opKeys = $op->getKeysBy('OrderID', 'asc', " WHERE OrderNumber = '" .$TempOrderKey ."'");
	if(count($opKeys) == 1 ) {
		$op->getRow( $opKeys[0] ); 
		$op->setDateTime3(date ('Y-m-d h:i:s'));
	}	
	$op->saveRow();
	
	header("HTTP/1.1 200 OK");