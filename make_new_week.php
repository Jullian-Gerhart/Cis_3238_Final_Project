<?php require_once("src/header.php"); ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <form action="create_week_verify.php" method="post">
        Name of Week (DO NOT INCLUDE WHITESPACE):<input type="text" name="week"><br>
        <input type="submit">
    </div>
    <?php 
    //These are the erorr validiation codes
    if(!empty($_GET["status"])){ 
        if($_GET['status'] == 1){
            echo("Do not include white spaces");
        }
        if($_GET['status'] == 2){
            echo("Week name must be unique");
        }
    }
    ?>
    <?php //require_once("src/rightPanel.php"); ?>
</div>  
<?php
    //require_once("src/footer.php");
?>
