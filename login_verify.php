<html>Test</html>
<?php

$username =  $_POST["username"];
$password = $_POST["password"];

$lines = file('accounts.txt');
foreach ($lines as $line_num => $line) {
    list($l_user, $l_password, $l_isadmin) = explode(',', $line);
    echo "User :".$l_user." Password :".$l_password."<br>";
    if($username == $l_user){
        if($password == $l_password){
               header("Location: home.php?user=".$l_user);
               exit();
        } 
    }
}
header("Location: index.php?status=1");
exit();

?>