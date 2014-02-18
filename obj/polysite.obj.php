<?
if(file_exists("inc/config.func.php")){
	include_once("inc/config.func.php");
} else if(file_exists("../inc/config.func.php")){
	include_once("../inc/config.func.php");
}
class PolySite{
	function __constructor(){
		
	}
	function getContent($cid){
		global $db_host, $db_user, $db_pass, $db_name;
		$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
		if($db->connect_errno >0){
			die("Mysql ERROR!! " . $db->connect_error);
		}
		if($query = $db->prepare("SELECT * FROM `content` WHERE `cid` = ?")){
			$query->bind_param("s", $cid);
			$query->execute();
			$query->bind_result($content['cid'], $content['data']);
			$query->fetch();
			return $content['data'];
		}
	}
}

?>