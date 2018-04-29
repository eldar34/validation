<?php

include("../blocks/bd.php");


$sql = "SELECT * FROM records ";
$result2 = $pdo->query($sql);


$filename = 'my.csv';
$delimetr = ";";

$fp = fopen($filename, "w+");




while($myrow2 = $result2->fetch()){
	

	fputcsv($fp, $myrow2, $delimetr);

}

fclose($fp);


header('Content-Type: csv');
header('Content-Disposition: attachment; filename="my.csv"');
readfile($filename);


?>