<?php require_once("src/header.php"); include 'function.php'; ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        Select a Running Back:
        <ul>
        <?php 
            //Read in GET data
            $week =  $_GET["week"];
            $game = $_GET["game"];
            $pwd = getcwd();
            $lines = file("$pwd/week/$week/$game.txt");
            foreach ($lines as $line_num => $line){
                list($guy, $o1, $o2) = explode(';',$line);
                //List all of the RB's for that week for that game (File pasth is dependent upon GET data)
                echo "<li><a href='view_rb.php?game=$game&rb=$guy&week=$week'>$guy</a></li>";
            }
        ?>
        </ul>
        <?php
            //Link to make the running backs is dependent on GET data
            echo "<a href='make_new_rb.php?week=$week&game=$game'>Create New Running Back</a>";
        ?>
    </div>
    <?php //require_once("src/rightPanel.php"); ?>
</div>
<?php
    //require_once("src/footer.php");
?>