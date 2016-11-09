
<style>
<?php include 'public_html/css/main.css'; ?>
</style>
<h3>Welcome to the college football running back algorithm!</h3><br>

<div class="body">
    <div id="content">
        <form action="login_verify.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit">
    </div>
    <?php 
    //See if there are any errors
    if(!empty($_GET["status"])){ 
        if($_GET['status'] == 1){
            echo("Invalid username/password");
        } 
    }
    ?>
    <?php //require_once("src/rightPanel.php"); ?>
</div>  
<?php
    //require_once("src/footer.php");

?>