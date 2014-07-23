<?
session_start();
include_once("config.func.php");
include_once("../obj/headerlink.obj.php");
if(isset($_SESSION['is_admin'])){
	if(isset($_POST)){
		$uuid = $_POST['uuid'];
		$type = strstr($uuid, "_", true);
		$text = $_POST['text'];
		$dbh = new mysqli($db_host, $db_user, $db_pass, $db_name);
		if($dbh->connect_errno >0){
			die("Mysql ERROR!! " . $dbh->connect_error);
		}
		if($queryh = $dbh->prepare("SELECT * FROM `settings` WHERE `id`='headerlinks'")){
			$queryh->execute();
			$queryh->bind_result($obj['id'], $obj['value']);
			while($queryh->fetch()){
				$object = unserialize(base64_decode($obj['value']));
			}
			$queryh->close();
		}
		if($type=="PolyHeaderInit"){
			$icon = $_POST['icon'];
			$url  = $_POST['url'];
			$object->updatePolyHeaderInit($uuid, $text, $icon, $url);
		} else if($type=="PolyHeaderLinkChild"){
			$url  = $_POST['url'];
			$target = $_POST['target'];
			$object->updatePolyHeaderLinkChild($uuid, $url, $text, $target);
		} else if($type=="PolyHeaderExpandChild"){
			$object->updatePolyHeaderExpandChild($uuid, $text);
		}
		$obs = base64_encode(serialize($object));
		if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='headerlinks';")){
			$stmt->bind_param("s", $obs);
			$stmt->execute();
			$stmt->close();
		}
		$dbh->close();
		header("Location: /?p=admin&ap=header#".$uuid);
	}
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>