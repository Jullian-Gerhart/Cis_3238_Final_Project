<html>Test</html>
<?php

$username =  $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
if(!empty($_POST["admin"])){
    $admin = 1;
}else{
    $admin = 0;
}

$lines = file('accounts.txt');
foreach ($lines as $line_num => $line) {
    list($l_user, $l_password, $l_isadmin) = explode(',', $line);
    echo "User :".$l_user." Password :".$l_password."<br>";
    if($username == $l_user){
        header("Location: create_account.php?status=1");
        exit();
    } 
    
    if($password1 != $password2){
        header("Location: create_account.php?status=2");
        exit();
    }
        
}
$myfile = fopen("accounts.txt", "a") or die("Unable to open file!");

$final_write = "\n".$username.",".$password2.",".$admin;
fwrite($myfile, $final_write);
fclose($myfile);

header("Location: create_account.php?status=3");
exit();

?>