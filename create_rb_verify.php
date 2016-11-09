<html>Test</html>
<?php
//Get in post data
$name =  $_POST["name"];
$pos = $_POST["pos"];
$week = $_POST["week"];
$game = $_POST["game"];

//Get the cur directory
$pwd = getcwd();
$myfile = fopen("$pwd/week/$week/$game.txt", "a") or die("Unable to open file!");

//boolean to see if file is empty
$f_size = filesize("$pwd/week/$week/$game.txt");

//If the files empyth no buffer, if it snot buff it up
if($f_size == 0){
    $final_write = $pos.":".$name.';100;null';
}else{
    $final_write = "\n".$pos.":".$name.';100;null';
}
//
//Write to the file and close it
fwrite($myfile, $final_write);
fclose($myfile);

//Renavigate and exit
header("Location: select_rb.php?game=$game&week=$week");
exit();

?>