<?php
$fname = "counter.txt";
$fp = fopen($fname, "r");
$count = fscanf($fp,"%d");
fclose($fp);
$count[0]++ ;
//echo "<p> The Number of vistior are: " . $count . "<p>";
$fp = fopen($fname, "w");
fwrite($fp, "%d",$count[0]);

fclose($fp);

echo "<p> The Number of vistior are: " . $count[0] . "<p>";
?>