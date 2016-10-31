<html>Test</html>
<?php

$week =  $_POST["week"];

if ( preg_match('/\s/',$week)){
       header("Location: make_new_week.php?status=1");
       exit();
}
$lines = file('weeks.txt');
foreach ($lines as $line_num => $line){
    
    list($t_week, $null) = explode(';', $line);
    if($t_week == $week){
        header("Location: make_new_week.php?status=2");
        exit();
    }
        
}
$myfile = fopen("weeks.txt", "a") or die("Unable to open file!");

$final_write = "\n".$week.";";
fwrite($myfile, $final_write);
fclose($myfile);
$pwd = getcwd();
touch($pwd."/week/".$week.".txt");
mkdir($pwd."/week/".$week);

header("Location: week_rb.php");
exit();

?>