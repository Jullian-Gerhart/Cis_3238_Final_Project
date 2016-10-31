<?php require_once("src/header.php"); ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <form action="create_game_verify.php" method="post">
        Name of Opponent 1 (DO NOT INCLUDE WHITESPACE):<input type="text" name="opp1"><br>
        Name of Opponent 2 (DO NOT INCLUDE WHITESPACE):<input type="text" name="opp2"><br>
        <?php
            $week = $_GET["week"];
            echo "<input type='hidden' value='$week' name='week' />";
        ?>
        <input type="submit">
    </div>
    <?php 
    if(!empty($_GET["status"])){ 
        if($_GET['status'] == 1){
            echo("Do not include white spaces!");
        }
        if($_GET['status'] == 2){
            echo("Game name must be unique");
        }
    }
    ?>
    <?php //require_once("src/rightPanel.php"); ?>
</div>  
<?php
    //require_once("src/footer.php");
?>
