<?php


$list = array (
    array("name 1", "age 1", "city 1"),
    array("name 2", "age 2", "city 2"),
    array("name 3", "age 3", "city 3")
)
;
$outputarray=array();
$text=$_POST["outdata"];
echo $text;

$textarray=explode("!",$text);
for($i=0;$i<count($textarray);$i++){
	$row=explode(",",$textarray[$i]);
	array_push($outputarray,$row);
	
	
}
$fp = fopen('file.csv', 'w');

foreach ($outputarray as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
echo "ok";


?>