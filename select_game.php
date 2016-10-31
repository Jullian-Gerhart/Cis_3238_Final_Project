<?php require_once("src/header.php"); include 'function.php'; ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        Select a Game:
        <ul>
        <?php 
            $week =  $_GET["week"];
            $pwd = getcwd();
            $lines = file("$pwd/week/$week.txt");
            foreach ($lines as $line_num => $line){
                list($opp1, $opp2) = explode('VS', $line);
                echo "<li><a href='select_rb.php?game=$line&week=$week'>$opp1 VS $opp2</a></li>";

            }
        ?>
        </ul>
        <?php
            
            echo "<a href='make_new_game.php?week=$week'>Create New Game</a>";
        ?>
    </div>
    <?php //require_once("src/rightPanel.php"); ?>
</div>
<?php
    //require_once("src/footer.php");
?>