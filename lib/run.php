<?php

$dsn = 'mysql:dbname=married;host=localhost';
$user = "username";
$password = "password";

try{
  $link = new PDO($dsn,$user,$password);
}catch( PDOException $e){
    printf("DatabaseError: %s",$e->getMessage());
}
list($sid) = $link -> query("select * from `msg`")->fetch();
print_r($sid);
?>
