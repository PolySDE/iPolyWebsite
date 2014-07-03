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
	/*
	if(isset($_POST['x']) && !isset($_POST['y']) && !isset($_POST['z'])){
		$x = intval($_POST['x']);
		$text = $_POST['text'];
		$icon = $_POST['icon'];
		$url = $_POST['url'];
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
		$object->childInits[$x]->setText($text);
		$object->childInits[$x]->setIcon($icon);
		$object->childInits[$x]->setURL($url);
		$obs = base64_encode(serialize($object));
		if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='headerlinks';")){
			$stmt->bind_param("s", $obs);
			$stmt->execute();
			$stmt->close();
		}
		$dbh->close();
		header("Location: /?p=admin&ap=header#headerinitst".$_POST['x']);
	} else if(isset($_POST['x']) && isset($_POST['y']) && !isset($_POST['z'])){
		$x = intval($_POST['x']);
		$y = intval($_POST['y']);
		$text = $_POST['text'];
		if(isset($_POST['target']) || isset($_POST['url'])){
			$target = $_POST['target'];
			$url = $_POST['url'];
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
			$object->childInits[$x]->parentObject->children[$y]->setText($text);
			$object->childInits[$x]->parentObject->children[$y]->setTarget($target);
			$object->childInits[$x]->parentObject->children[$y]->setURL($url);
			$obs = base64_encode(serialize($object));
			if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='headerlinks';")){
				$stmt->bind_param("s", $obs);
				$stmt->execute();
				$stmt->close();
			}
			$dbh->close();
		} else {
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
			$object->childInits[$x]->parentObject->children[$y]->setText($text);
			$obs = base64_encode(serialize($object));
			if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='headerlinks';")){
				$stmt->bind_param("s", $obs);
				$stmt->execute();
				$stmt->close();
			}
			$dbh->close();
		}
		header("Location: /?p=admin&ap=header#thisParentsChildrenstx".$_POST['x']."y".$_POST['y']);
	} else if(isset($_POST['x']) && isset($_POST['y']) && isset($_POST['z'])){
		$x = intval($_POST['x']);
		$y = intval($_POST['y']);
		$z = intval($_POST['z']);
		$text = $_POST['text'];
		$target = $_POST['target'];
		$url = $_POST['url'];
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
		$object->childInits[$x]->parentObject->children[$y]->childrenP->children[$z]->setText($text);
		$object->childInits[$x]->parentObject->children[$y]->childrenP->children[$z]->setTarget($target);
		$object->childInits[$x]->parentObject->children[$y]->childrenP->children[$z]->setURL($url);
		$obs = base64_encode(serialize($object));
		if($stmt = $dbh->prepare("UPDATE `settings` SET value=? WHERE id='headerlinks';")){
			$stmt->bind_param("s", $obs);
			$stmt->execute();
			$stmt->close();
		}
		$dbh->close();
		header("Location: /?p=admin&ap=header#childparentchildstx".$_POST['x']."y".$_POST['y']."z".$_POST['z']);
	}
	*/
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>