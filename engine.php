<?
// Ako je booking zapoceo, spremi OrderKey u COOKIE
// da bi korisnik mogao nastaviti booking kasnije
if($_SESSION['BOOKING_STARTED']) {
	if (isset($_SESSION['OrderKey'])) {
		setcookie("Key", $_SESSION['OrderKey'], time() + (7*24*60*60));
	}
}

// Sprema adresu na koju korisnik zeli doci
// ali ako nije logiran, ne moze
// nakon Logina vraca korisnika na spremljenu stranicu
$_SESSION['InitialRequest'] = $_SERVER['REQUEST_URI'];

// aktivna stranica iz url-a	
$baseUrl = "/";
$pathVars = new PathVars($baseUrl);
if(DEVELOPMENT) $indexStart = 0;
else $indexStart = 1;
$activePage=$pathVars->fetchByIndex($indexStart + 1);
$_REQUEST['p']=$activePage;
$smarty->assign('page',$activePage);

/*
// SESSION TIMEOUT - ovo su rekli da ne vole	
$lockscreen = 2000; // minuta
if(isset($_SESSION['timestamp']) and ((time() - $_SESSION['timestamp']) > $lockscreen * 60) ) { 
	unset($_SESSION['password'], $_SESSION['timestamp']);
	$_SESSION['UserAuthorized'] = false;
	header("Location: lockscreen.php"); 
	exit;
} else {
	$_SESSION['timestamp'] = time(); 
}
*/

// LOGIN
if(!isset($_SESSION['UserAuthorized']) or $_SESSION['UserAuthorized'] == false) {
	require_once 'login.php';
	exit();	
}
else setcookie("page", $activePage, time() + (7*24*60*60));

// LOGIN AS USER
if(isset($_REQUEST['sa_u']) and $_REQUEST['sa_u'] !='' and is_numeric($_REQUEST['sa_u'])
and isset($_REQUEST['sa_l']) and $_REQUEST['sa_l'] !='' and is_numeric($_REQUEST['sa_l'])) {
	require_once 'loginasuser.php'; 
}

// SELECT FOLDER/PAGE TO LOAD, ovisno o profilu korisnika
if ($_REQUEST['af']) $_SESSION['af']=$_REQUEST['af'];
if ($_SESSION['af']) $activeFolder=$_SESSION['af'];
else $activeFolder = 'cms/'.trim( strtolower($_SESSION['GroupProfile']) );
$activePage = 'dashboard';
	
// help stranica	
$size=$pathVars->size();
if ($pathVars->fetchByIndex($indexStart + $size - 1)=='help') {
	$activePage='tutorials';
	if(isset($_REQUEST['p']) and $_REQUEST['p'] != '') $help=$_REQUEST['p'];
	else $help="menu";
}
else if(isset($_REQUEST['p']) and $_REQUEST['p'] != '') $activePage = $_REQUEST['p'];
		
// meni
require_once $activeFolder . '/' . 'menu.php';
//stranica
require_once $activeFolder . '/' . 'controler.php';
 $smarty->assign('page',$page);
 $smarty->assign('function_all',$function_all);
  
// display
$smarty->display("index.tpl");	

?>