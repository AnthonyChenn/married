<?php
require_once("db.php");

$name = $_POST["name"] ;
$msg  = $_POST["msg"];

$conn = db_open();
$sql = "insert into msg (`name`,`message`) values (?,?)";
$result = db_exec($conn,$sql,array($name,$msg));
echo $result ;

?>
