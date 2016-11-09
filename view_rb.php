<?php require_once("src/header.php"); include 'function.php'; ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <?php 
            //Read in GET data
            $week =  $_GET["week"];
            $game = $_GET["game"];
            $guy = $_GET["rb"];
            $pwd = getcwd();
            $lines = file("$pwd/week/$week/$game.txt");
            foreach ($lines as $line_num => $line){
                list($rb, $score, $comments) = explode(';',$line);
                
                //Check to to see if the running back we selected is in the file
                if($rb == $guy){
                       //Once you find the running back your looking for, 
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