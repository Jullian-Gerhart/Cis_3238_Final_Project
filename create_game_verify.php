<?php

//Read in post data
$opp1 =  $_POST["opp1"];
$opp2 =  $_POST["opp2"];
$week =  $_POST["week"];
//Games are opponenet against opponent with VS dimilmated 
$gameFINAL = $opp1."VS".$opp2;

//If there is a whitespace in either opponent's form post flag an error
if ( preg_match('/\s/',$opp2)){
       header("Location: make_new_game.php?status=1");
       exit();
}
if ( preg_match('/\s/',$opp1)){
       header("Location: make_new_game.php?status=1");
       exit();
}

//Get the directory structure
$pwd = getcwd();
$lines = file("$pwd/week/$week.txt");
foreach ($lines as $line_num => $line){
    //If the game already exists, then flag error
    if($line == $gameFINAL){
        header("Location: make_new_week.php?status=2");
        exit();
    }
        
}
//See if the week file is empty or not
$myfile = fopen("$pwd/week/$week.txt", "a") or die("Unable to open file!");
$c = 0;
foreach ($lines as $line_num => $line){
    $c = $c + 1;
}

//If the file is empty make the write clean, if not buffer with a white space. 
if($c != 0){
    $gameFINAL_WRITE = "\n".$gameFINAL;
}else{
    $gameFINAL_WRITE = $gameFINAL;
}

//Write to the file, make the new directory and file
fwrite($myfile, $gameFINAL_WRITE);
fclose($myfile);
touch($pwd."/week/".$week."/".$gameFINAL.".txt");
mkdir($pwd."/week/".$week."/".$gameFINAL);

//Go back to the file, exit this file
header("Location: select_game.php?week=".$week);
exit();

?>