<?
session_start();
$db_host = "localhost";
$db_user = "quiz";
$db_pass = "quiz";
$db_name = "iPoly";
date_default_timezone_set("America/Los_Angeles");
function makeChange($page, $guilty, $to){
	global $db_host, $db_user, $db_pass, $db_name;
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if($query = $mysqli->prepare("SELECT * FROM `pages` WHERE page=?")){
		$query->bind_param("s", $page);
		$query->execute();
		$query->bind_result($pages['pageid'], $pages['object'], $pages['access']);
		if($stmt = $mysqli -> prepare("INSERT INTO `pagelogs` VALUE ('',?,?,?,?,?);")){
			$stmt -> bind_param("sssss", $page, date(), $guilty, $pages['object'], $to);
			$stmt -> execute();
			$stmt -> close();
		} else {
			echo $mysqli->error;
		}
	} else {
		echo $mysqli->error;
	}
	
	$mysqli -> close();
}
?>