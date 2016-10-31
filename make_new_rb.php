<?php require_once("src/header.php"); ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <form action="create_rb_verify.php" method="post">
        Name of Player (DO NOT INCLUDE WHITESPACE):<input type="text" name="name"><br>
        <select name="pos">
            <option value="FB">FB</option>
            <option value="RB">RB</option>
        </select>
        <br>
        <?php
            $week = $_GET["week"];
            $game = $_GET["game"];
            list($team1, $team2) = explode("VS", $game);
            echo "<select name='team'><option value='$team1'>$team1</option><option value='$team2'>$team2</option></select><br>";
            echo "<input type='hidden' value='$week' name='week' />";
            echo "<input type='hidden' value='$game' name='game' />";
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
