<html>Test</html>
<?php

$opp1 =  $_POST["opp1"];
$opp2 =  $_POST["opp2"];
$week =  $_POST["week"];
$gameFINAL = "\n".$opp1."VS".$opp2;

if ( preg_match('/\s/',$opp2)){
       header("Location: make_new_game.php?status=1");
       exit();
}
if ( preg_match('/\s/',$opp1)){
       header("Location: make_new_game.php?status=1");
       exit();
}

$pwd = getcwd();
$lines = file("$pwd/week/$week.txt");
foreach ($lines as $line_num => $line){
    if($line == $gameFINAL){
        header("Location: make_new_week.php?status=2");
        exit();
    }
        
}
$myfile = fopen("$pwd/week/$week.txt", "a") or die("Unable to open file!");


fwrite($myfile, $gameFINAL);
fclose($myfile);
touch($pwd."/week/".$week."/".$gameFINAL.".txt");
mkdir($pwd."/week/".$week."/".$gameFINAL);

header("Location: select_game.php?week=".$week);
exit();

?>