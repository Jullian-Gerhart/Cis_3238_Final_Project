<html>Test</html>
<?php

$name =  $_POST["name"];
$pos = $_POST["pos"];
$week = $_POST["week"];
$game = $_POST["game"];

$pwd = getcwd();
$myfile = fopen("$pwd/week/$week/$game.txt", "a") or die("Unable to open file!");

$final_write = "\n".$pos.":".$name.';100;null';
fwrite($myfile, $final_write);
fclose($myfile);

header("Location: select_rb.php?game=$game&week=$week");
exit();

?>