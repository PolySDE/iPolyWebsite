<?
session_start();
include_once("config.func.php");
include_once("../obj/polypage.obj.php");
if($_POST['submit']=="Save" && isset($_SESSION['is_admin'])){
	$pageTitle = $_POST['pageTitle'];
	$pageContent = $_POST['pageContent'];
	$page = $_POST['page'];
	$pageType = $_POST['pageType'];
	$tempObject = new PolyPage($pageType, $pageTitle);
	$tempObject->setPageContent($pageContent);
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if($stmt = $mysqli -> prepare("UPDATE `pages` SET object=? WHERE pageid=?;")){
				$stmt -> bind_param("ss",$tempObject->serializeThis(), $page);
				$stmt -> execute();
				$stmt -> close();
			} else {
				echo $mysqli->error;
			}
			$mysqli -> close();
			header('Location: ../?p='.$page);
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>