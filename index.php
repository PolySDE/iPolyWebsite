<?
session_start();
include_once("func/config.func.php");
include_once("obj/polysite.obj.php");
include_once("obj/polypage.obj.php");
$thissite = new PolySite();
include_once("inc/header.inc.php");
if(isset($_GET['p'])){
	$page = $_GET['p'];
} else {
	$page = "";
}
if(isset($_GET['e'])){
	$edit = intval($_GET['e']);
} else {
	$edit = 0;
}
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($db->connect_errno >0){
	die("Mysql ERROR!! " . $db->connect_error);
}
$pagefound = false;
if($query = $db->prepare("SELECT * FROM `pages`")){
	$query->execute();
	$query->bind_result($pages['pageid'], $pages['object'], $pages['access']);
	while($query->fetch()){
		if($page==$pages['pageid'] && $pagefound==false && $page!="home"){
			$pagefound = true;
			$thispage = unserialize(base64_decode($pages['object']));
			if(isset($_SESSION['is_admin']) && $edit==1){
				$thispage->printEditPage();
			} else {
				$thispage->printPage();
			}
		}
	}
	if($pagefound == false){
		include_once("inc/home.inc.php");
	}
}
include_once("inc/footer.inc.php");

?>