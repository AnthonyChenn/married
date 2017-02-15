<?php

$index = $_POST['index'];
$directory = "../assets/images/all.txt";
$file = fopen($directory,'r');
$results = array();
while(!feof($file)){
	$value = fgets($file);
	if(!empty($value))
		array_push($results,$value);
}
$length = count($results);
echo "assets/images/all/".$results[$index%$length] ;

?>
