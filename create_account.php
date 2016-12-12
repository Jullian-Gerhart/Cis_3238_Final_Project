
<?php 
    //Always include the header
    require_once("src/header.php"); 
?>
<style>
<?php 
    //Always include CSS
    include 'public_html/css/main.css';
?>
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
    //Here we have the responces from the verify process. Return codes and there errors are clear
    if(!empty($_GET["status"])){ 
        if($_GET['status'] == 1){
            echo("Account already exists");//Pass back errors
        } 
        if($_GET['status'] == 2){
            echo("Passwords don't match");
        }
        if($_GET['status'] == 3){
            echo("Account created!");
        }
    }
    ?>
    
</div>  