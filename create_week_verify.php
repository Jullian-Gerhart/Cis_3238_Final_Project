<html>Test</html>
<?php
//Get in post data
$week =  $_POST["week"];

//If there is a white space in the week name, return with error
if ( preg_match('/\s/',$week)){
       header("Location: make_new_week.php?status=1");
       exit();
}
$lines = file('weeks.txt');
foreach ($lines as $line_num => $line){
    
    list($t_week, $null) = explode(';', $line);
    //If the name of the 
    if($t_week == $week){
        header("Location: make_new_week.php?status=2");
        exit();
    }
        
}
//See if the file is empty
$f_size = filesize("weeks.txt");

//Open the file
$myfile = fopen("weeks.txt", "a") or die("Unable to open file!");

//If the file is empy Write with no buffer and if itsnt empty but the buffer 
if($f_size == 0){
    $final_write = $week.";";
}else{
//If it is then no offset
    $final_write = "\n".$week.";";
}

//Write to the file 
fwrite($myfile, $final_write);
fclose($myfile);
//Get in he current dir and creat the write files and direcetories
$pwd = getcwd();
echo $pwd."/week/".$week.".txt<br>";
touch($pwd."/week/".$week.".txt");
mkdir($pwd."/week/".$week);

//Relocate To original page
header("Location: week_rb.php");
exit();

?>