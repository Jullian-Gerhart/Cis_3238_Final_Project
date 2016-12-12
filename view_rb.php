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
                       echo "<h2>Projected Td's: $score</h2>";
                       echo "<h2>Projected Yards's: $comments</h2>";
                }
                  
            }
            list($pos, $name) = explode(":", $guy);
            $f_size = filesize("$pwd\\week\\$week\\$game\\$name.txt");
            if($f_size){
                $coms = file("$pwd\\week\\$week\\$game\\$name.txt");
                foreach($coms as $com_num => $com){
                    list($user, $cs) = explode('|',$com);
                    echo "<b>$user</b>: $cs<br>";                
                }
            }
        ?>
        <br><br>
        <form action="create_comment_verify.php" method="post">
        Leave a comment:<br>
        <textarea name='comment' id='comment'></textarea><br />
        <?php
            $week = $_GET["week"];
            $game = $_GET["game"];
            $guy = $_GET["rb"];
            $lines = file("cookies.txt");
            $username = "null";
            foreach ($lines as $line_num => $line){
                list($tag, $value) = explode('|',$line);
                if($tag == "USERNAME"){
                    $username = $value;
                }
            }
            echo "<input type='hidden' value='$username' name='username' />";
            echo "<input type='hidden' value='$week' name='week' />";
            echo "<input type='hidden' value='$game' name='game' />";
            echo "<input type='hidden' value='$guy' name='rb' />";
        ?>
        
        <input type="submit">
        
    </div>
    <?php //require_once("src/rightPanel.php"); ?>
</div>
<?php
    //require_once("src/footer.php");
?>