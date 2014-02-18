<?
/*
include_once("../func/config.func.php");
include_once("polypage.obj.php");
$temp = new PolyPage("no-sidebar", "Title");
$temp->setPageContent('');
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
$pagestomake = array(
"9th_english", "9th_math", "9th_science", "9th_social",
"10th_english", "10th_math", "10th_science", "10th_social",
"11th_english", "11th_math", "11th_science", "11th_social",
"12th_english", "12th_math", "12th_science", "12th_social", "12th_project",
"sped", "pe", "counseling", "admissions",
"parents_general", "parents_commitment", "parents_ptsa", "parents_standards",
"alumni_general", "alumni_classes", "alumni_contact",
"contact_info", "contact_calendar", "contact_map"

);
for($x = 0; $x < count($pagestomake); $x++){
	if($stmt = $mysqli -> prepare("INSERT INTO `pages` VALUES (?,?,'')")){
		$stmt -> bind_param("ss", $pagestomake[$x], $temp->serializeThis());
		$stmt -> execute();
		$stmt -> close();
	} else {
		echo $mysqli->error;
	}
}

$mysqli -> close();
*/
?>