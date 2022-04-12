<?
// aktivna stranica iz url-a	
$baseUrl = "/";
$pathVars = new PathVars($baseUrl);
if (LOCAL) $indexStart = 1;
else $indexStart = 0;
$size=$pathVars->size();
if ($size>0) {
	$activePage=$pathVars->fetchByIndex($indexStart);
}	
else $activePage = 'dashboard';
$help="menu";
$isNew=false;

switch ($activePage) {
	case 'loginAsUser':
		$_REQUEST['sa_u']=$pathVars->fetchByIndex($indexStart + 1);
		$_REQUEST['sa_l']=$pathVars->fetchByIndex($indexStart + 2);
		$activePage = 'dashboard';		
	case 'satAsDriver':
		$_SESSION['UseDriverID']=$pathVars->fetchByIndex($indexStart + 1);
		require_once ROOT . '/db/v4_AuthUsers.class.php';
		$au = new v4_AuthUsers();
		$au->getRow($_SESSION['UseDriverID']);
		$_SESSION['UseDriverName']=$au->getAuthUserRealName();
		header('Location: '.ROOT_HOME);
	default:
		if ($pathVars->fetchByIndex($indexStart + 1)) { 
			if (is_numeric($pathVars->fetchByIndex($indexStart + 1))) {
				$item=$pathVars->fetchByIndex($indexStart + 1);
				$smarty->assign('item',$item);
			}
			else if (($pathVars->fetchByIndex($indexStart + 1))=='connect') {
				$item=$pathVars->fetchByIndex($indexStart + 2);
				// ovde ubaciti program koji vrsi konekciju master i driver tabela	
				require ROOT."/plugins/makeDriverConnection.php";
			}
		}	
}


$specialpage=$pathVars->fetchByIndex($indexStart + $size - 2);
switch ($specialpage) {
	case 'help':
		$help=$activePage;
		$activePage='tutorials';	
	case 'new':
		$isNew=true;
		$smarty->assign('isNew',$isNew);	
	default:
}	


