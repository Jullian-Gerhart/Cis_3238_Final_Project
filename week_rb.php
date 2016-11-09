<?php require_once("src/header.php"); include 'function.php'; ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        Select a Week:
        <ul>
        <?php 
            //Populate the weeks based on week.txt
            $lines = file('weeks.txt');
            foreach ($lines as $line_num => $line){
                list($week, $null) = explode(';', $line);
                echo "<li><a href='select_game.php?week=$week'>$week</a></li>";

            }
        ?>
        </ul>
        <a href="make_new_week.php">Create New Week</a>
    </div>
    <?php //require_once("src/rightPanel.php"); ?>
</div>
<?php
    //require_once("src/footer.php");
?>