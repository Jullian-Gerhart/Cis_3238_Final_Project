<html>Test</html>
<?php
//Get in post data
$week = $_POST["week"];
$game = $_POST["game"];
$guy = $_POST["rb"];
list($pos, $rb) = explode(":", $guy);
$username = $_POST["username"];
$comment = $_POST["comment"];

$pwd = getcwd();



$myfile = fopen("$pwd\\week\\$week\\$game\\$rb.txt", "a") or die("Unable to open file!");

//boolean to see if file is empty
$f_size = filesize("$pwd\\week\\$week\\$game\\$rb.txt");

//If the files empty, no buffer. If it is not buff it up
if($f_size == 0){
    $final_write = "$username|$comment";
}else{
    $final_write = "\n$username|$comment";
}

//Write to the file 
fwrite($myfile, $final_write);
fclose($myfile);

header("Location: view_rb.php?game=$game&week=$week&rb=$guy");
exit();

?>