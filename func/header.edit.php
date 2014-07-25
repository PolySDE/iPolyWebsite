<?
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("config.func.php");
include_once("../obj/headerlink.obj.php");
if(isset($_SESSION['is_admin'])){
	if(isset($_POST) && isset($_POST['uuid'])){
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
		//Edit
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
		//Add
		if($type=="beforePolyHeaderInit"){
			$icon = $_POST['icon'];
			$url  = $_POST['url'];
			$object->addPolyHeaderInitBefore(new PolyHeaderInit($icon, $url, $text, new PolyHeaderLinkParent(array(new PolyHeaderLinkChild("", "Link 1", "")))), str_replace("before", "", $uuid));
			//echo "Adding PolyHeaderInit before ".str_replace("before", "", $uuid);
		} else if($type=="beforePolyHeaderLinkChild"){
			$url  = $_POST['url'];
			$target = $_POST['target'];
			//echo "Adding PolyHeaderLinkChild before ".str_replace("before", "", $uuid);
			//$object->addPolyHeaderLinkChildBefore(str_replace("before", "", $uuid), $url, $text, $target);
		} else if($type=="beforePolyHeaderExpandChild"){
			//$object->addPolyHeaderExpandChildBefore(str_replace("before", "", $uuid), $text);
			//echo "Adding PolyHeaderExpandChild before ".str_replace("before", "", $uuid);
		}
		if($type=="afterPolyHeaderInit"){
			$icon = $_POST['icon'];
			$url  = $_POST['url'];
			$object->addPolyHeaderInitAfter(new PolyHeaderInit($icon, $url, $text, new PolyHeaderLinkParent(array(new PolyHeaderLinkChild("", "Link 1", "")))), str_replace("after", "", $uuid));
			//echo "Adding PolyHeaderInit after ".str_replace("after", "", $uuid);
			//$object->addPolyHeaderInitAfter(str_replace("after", "", $uuid), $text, $icon, $url);
		} else if($type=="afterPolyHeaderLinkChild"){
			$url  = $_POST['url'];
			$target = $_POST['target'];
			//echo "Adding PolyHeaderLinkChild after ".str_replace("after", "", $uuid);
			//$object->addPolyHeaderLinkChildAfter(str_replace("after", "", $uuid), $url, $text, $target);
		} else if($type=="afterPolyHeaderExpandChild"){
			//echo "Adding PolyHeaderExpandChild after ".str_replace("after", "", $uuid);
			//$object->addPolyHeaderExpandChildAfter(str_replace("after", "", $uuid), $text);
		}
		$obs = base64_encode(serialize($object));
		if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='headerlinks';")){
			$stmt->bind_param("s", $obs);
			$stmt->execute();
			$stmt->close();
		}
		$dbh->close();
		header("Location: /?p=admin&ap=header#".$uuid);
	} else if(isset($_GET['remove'])) {
		$uuid = $_GET['remove'];
		$type = strstr($uuid, "_", true);
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
		//Remove
		if($type=="PolyHeaderInit"){
			$object->removePolyHeaderInit($uuid);
		} else if($type=="PolyHeaderLinkChild"){
			//$url  = $_POST['url'];
			//$target = $_POST['target'];
			//$object->updatePolyHeaderLinkChild($uuid, $url, $text, $target);
		} else if($type=="PolyHeaderExpandChild"){
			//$object->updatePolyHeaderExpandChild($uuid, $text);
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