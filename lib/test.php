<?php
require_once("db.php");

$db = new DB();
$db->connect();
$db->query("INSERT into msg (`message`) values ('hello')");
while($result = $db->fetch_array())
{
}
?>
