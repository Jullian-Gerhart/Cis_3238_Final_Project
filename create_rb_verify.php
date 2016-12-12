<html>Test</html>
<?php
//Get in post data
$name =  $_POST["name"];
$pos = $_POST["pos"];
$week = $_POST["week"];
$game = $_POST["game"];
$ty = $_POST["ty"];
$ol_or = $_POST["olor"];
$dl_or = $_POST["dlor"];
$ou = $_POST["ou"];
$spread = $_POST["spread"];
$i = $_POST["i"];
$home = $_POST["home"];
$pb = $_POST["pb"];

echo $i;



echo "$ol_or, $dl_or<br>";

if ($ol_or <= 0 || $ol_or >= 100){
    header("Location: make_new_rb.php?game=$game&week=$week&status=2"); //Here is your boundry testing
    exit();
}
if ($dl_or <= 0 or $dl_or >= 100){
    header("Location: make_new_rb.php?game=$game&week=$week&status=3");//all of these will return different eroor message
    exit();
}
if ( preg_match('/\s/',$name)){
    header("Location: make_new_rb.php?game=$game&week=$week&status=1");
    exit();
}
if( $ou <= 0 ){
    header("Location: make_new_rb.php?game=$game&week=$week&status=4");
    exit();
}

$yards = (($ty * ($ol_or-$dl_or)/100)+$ty)*(.3 + ($pb * .4) + ($i * -.2)); //Formula for getting in the yards
if($home==0){
    $home = -1;
}

$tds = floor((($ou-($spread*$home))/4)/7)-($i); //Formula for touch downs

//Get the cur directory
$pwd = getcwd();
$myfile = fopen("$pwd/week/$week/$game.txt", "a") or die("Unable to open file!");

//boolean to see if file is empty
$f_size = filesize("$pwd/week/$week/$game.txt");

//If the files empyth no buffer, if it snot buff it up
if($f_size == 0){
    $final_write = $pos.":".$name.';'.$tds.';'.$yards;
}else{
    $final_write = "\n".$pos.":".$name.';'.$tds.';'.$yards;
}
//
//Write to the file and close it
fwrite($myfile, $final_write);
fclose($myfile);

touch("$pwd\\week\\$week\\$game\\$name.txt");


//Renavigate and exit
header("Location: select_rb.php?game=$game&week=$week");
exit();

?>