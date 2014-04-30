<?
include_once("config.func.php");
$dbh = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($dbh->connect_errno >0){
	die("Mysql ERROR!! " . $dbh->connect_error);
}
if($queryh = $dbh->prepare("SELECT id,page,date,theguiltyperson FROM `pagelogs`;")){
	$queryh->execute();
	$queryh->bind_result($page['id'], $page['page'], $page['date'], $page['theguiltyperson']);
	?>
    <table>
    <tr>
    	<td>Log Id</td>
        <td>Page Id</td>
        <td>Date/Time Changed</td>
        <td>User</td>
    </tr>
    <?
	while($queryh->fetch()){
		?>
        <tr>
        	<td><? echo $page['id']; ?></td>
            <td><? echo $page['page']; ?></td>
            <td><? echo date("M-d-y", $page['date']); ?></td>
            <td><? echo $page['theguiltyperson']; ?></td>
        </tr>
        <?
	}
	?>
    </table>
    <?
}
?>