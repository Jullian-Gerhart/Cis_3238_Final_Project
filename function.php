<?php
//Function file

//Given a user name to see if they are an dmin by opening the accounts file
 function isAdmin($username) {
     $lines = file('accounts.txt');
    foreach ($lines as $line_num => $line) {
        list($l_user, $l_password, $l_isadmin) = explode(',', $line);
        if($username == $l_user){
            return $l_isadmin;
        }
    }
    return -1;
 }

function test() { 
    echo "IT WORKS!!!!";
}

     
     
 
