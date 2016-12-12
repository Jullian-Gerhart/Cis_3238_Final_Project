<?php 
    unlink("cookies.txt"); // Simply delete the session cookie
    header("Location: index.php"); //And head back to login
    exit();
?>
