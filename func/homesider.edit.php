<?
session_start();
include_once("config.func.php");
include_once("../obj/homesider.obj.php");
if($_POST['submit']=="Save" && isset($_SESSION['is_admin'])){
	$title = $_POST['title'];
	$oldSider = new PolySider();
	$events = array();
	$oldSider->setTitle($title);
	for($x = 0; $x < count($oldSider->getEvents()); $x++){
		$events[$x] = new PolyEvent($_POST[$x.'title'], $_POST[$x.'text']);
	}
	if(strlen($_POST['newtitle'])>0){
		$newtitle = $_POST['newtitle'];
		$newtext = $_POST['newtext'];
		$newevent = new PolyEvent($newtitle, $newtext);
		array_splice($events, intval($_POST['before']), 0, array($newevent));
	}
	$oldSider->setEvents($events);
	$oldSider->pushData();
	header('Location: ../?p=home');
} else if(isset($_SESSION['is_admin']) && isset($_GET['delete']) && isset($_GET['eid'])){
	$oldSider = new PolySider();
	$events = $oldSider->getEvents();
	unset($events[intval($_GET['eid'])]);
	$eventsupdated = array_values($events);
	$oldSider->setEvents($eventsupdated);
	$oldSider->pushData();
}
header('Location: ../?p=home');
?>