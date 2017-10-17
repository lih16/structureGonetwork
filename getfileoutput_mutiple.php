<?php


header("Content-type: text/plain");

$file=$_GET["file"];
$uid=$_GET["uid"];
$tempfolder="../golinktemp/";
$directories=$tempfolder.$uid."/";

$output= file_get_contents($directories.$file); 
echo $output;

	
?>
