<?php require_once("src/header.php"); include 'function.php'; ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <?php 
            $week =  $_GET["week"];
            $game = $_GET["game"];
            $guy = $_GET["rb"];
            $pwd = getcwd();
            $lines = file("$pwd/week/$week/$game.txt");
            foreach ($lines as $line_num => $line){
                list($rb, $score, $comments) = explode(';',$line);
                if($rb = $guy){
                       echo "<h1>$rb</h1>";
                       echo "<h2>$score</h2>";
                       $cs = explode('|', $comments);
                       echo "<ul>";
                       foreach($cs as $c){
                          echo "<li>$c</li>"; 
                       }
                       echo "</ul>";
                }
                  
            }

        ?>
    </div>
    <?php //require_once("src/rightPanel.php"); ?>
</div>
<?php
    //require_once("src/footer.php");
?>