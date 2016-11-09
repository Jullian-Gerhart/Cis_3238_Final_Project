<html>Test</html>
<?php
//Get in post data
$username =  $_POST["username"];
$password = $_POST["password"];

//Open acounts file and get the right information
$lines = file('accounts.txt');
foreach ($lines as $line_num => $line) {
    list($l_user, $l_password, $l_isadmin) = explode(',', $line);
    echo "User :".$l_user." Password :".$l_password."<br>";
    if($username == $l_user){
        if($password == $l_password){
                if(file_exists("cookies.txt")){
                    unlink("cookies.txt");
                }
                //Set up the cookies file
                touch("cookies.txt");
                $myfile = fopen("cookies.txt", 'a');
                fwrite($myfile,"USERNAME|$username");
                fclose($myfile);
                
                //change the location
                header("Location: home.php?user=".$l_user);
                exit();
        } 
    }
}
//GO back to index page
header("Location: index.php?status=1");
exit();

?>