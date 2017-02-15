<?php

$file = fopen("all.txt",'a');
#$result = scandir("first");
$result = scandir("all");
foreach($result as $k => $v) {
	if($v != ".." && $v != "."){
		fwrite($file,$v."\n");
	}
}
fclose($file);
?>
