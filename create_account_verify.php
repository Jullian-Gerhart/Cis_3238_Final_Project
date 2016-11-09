
<?php
//Read in the post data
$username =  $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

//This post data might be empty, so if it is set it equal to 0
if(!empty($_POST["admin"])){
    $admin = 1;
}else{
    $admin = 0;
}

//Read in the account files to see all of the accounts
$lines = file('accounts.txt');
//Loop through all of them
foreach ($lines as $line_num => $line) {
    //Data structure is help together with commas, split it up
    list($l_user, $l_password, $l_isadmin) = explode(',', $line);
    //If the user name your trying to add already exist, flag error
    if($username == $l_user){
        header("Location: create_account.php?status=1");
        exit();
    } 
    
    //If the passwords do not match that you get from poast data, flag error
    if($password1 != $password2){
        header("Location: create_account.php?status=2");
        exit();
    }
        
}
//Open the accounts file for writing
$myfile = fopen("accounts.txt", "a") or die("Unable to open file!");
//Write in the username password and admin status comma seperated
$final_write = "\n".$username.",".$password2.",".$admin;
fwrite($myfile, $final_write);

//Close it and redir
fclose($myfile);
header("Location: create_account.php?status=3");
exit();

?>