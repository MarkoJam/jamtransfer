<?php

require_once "../config.php";

require_once ROOT . '/db/v4_FieldsDescriptions.class.php';

$fs = new v4_FieldsDescriptions();
$where = " WHERE `ModuleID` = " . $_REQUEST['ModuleID'];
$dbk = $fs->getKeysBy('ID', 'asc', $where);
$out=array();
if (count($dbk) != 0) {
    foreach ($dbk as $nn => $key)
    {
		$fs->getRow($key);
		$detailFlds = $fs->fieldValues();
		$out[] = $detailFlds; 
	}
}
$output = array(
'data' =>$out
);	
echo $_GET['callback'] . '(' . json_encode($output) . ')';	

