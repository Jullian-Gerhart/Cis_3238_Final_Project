<?php require_once("src/header.php"); ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <form action="create_account_verify.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password1"><br>
        Confirm Password: <input type="text" name="password2"><br>
        <input type="checkbox" name="admin" value="1">Admin?<br>
        <input type="submit">
    </div>
    <?php 
    if(!empty($_GET["status"])){ 
        if($_GET['status'] == 1){
            echo("Account already exists");
        } 
        if($_GET['status'] == 2){
            echo("Passwords don't match");
        }
        if($_GET['status'] == 3){
            echo("Account created!");
        }
    }
    ?>
    <?php //require_once("src/rightPanel.php"); ?>
</div>  
<?php
    //require_once("src/footer.php");
?>