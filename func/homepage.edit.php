<?
session_start();
include_once("config.func.php");
if(isset($_SESSION['is_admin'])){
	if(isset($_POST['subtitle'])){
		$dbh = new mysqli($db_host, $db_user, $db_pass, $db_name);
		if($dbh->connect_errno >0){
			die("Mysql ERROR!! " . $dbh->connect_error);
		}
		if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='homepage_subtitle'")){
			$stmt->bind_param("s", $_POST['subtitle']);
			$stmt->execute();
			$stmt->close();
		}
		$dbh->close();
	}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>