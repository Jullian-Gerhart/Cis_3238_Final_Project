<?php require_once("src/header.php"); ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        <?php
            if(!empty($_GET["status"])){
                $status = $_GET["status"];
                if ($status == 2){
                    echo "<b>Error</b> Please ensure ol_o is between 0 and 100<br><br>";
                }
                if ($status == 3){
                    echo "<b>Error</b> Please ensure dl_o is between 0 and 100<br><br>";
                }
                if ($status == 1){
                    echo "<b>Error</b> Please ensure name has no white spaces<br><br>";
                }
                if ($status == 4){
                    echo "<b>Error</b> Please ensure ou is positive<br><br>";
                }
            }    
        ?>
        <form action="create_rb_verify.php" method="post">
        <?php
            //Make page specific to page data
            //Set up lables
            $week = $_GET["week"];
            $game = $_GET["game"];
            list($team1, $team2) = explode("VS", $game);
            echo "Select the Team<select name='team'><option value='$team1'>$team1</option><option value='$team2'>$team2</option></select><br>";
            echo "<input type='hidden' value='$week' name='week' />";
            echo "<input type='hidden' value='$game' name='game' />";
        ?>    
        Name of Player (DO NOT INCLUDE WHITESPACE):<input type="text" name="name"><br>
        Select position<select name="pos">
            <option value="FB">FB</option>
            <option value="RB">RB</option>
        </select><br>
        <a href='http://www.vegasinsider.com/college-football/odds/las-vegas/'>Please input The spread for the game </a><input type="text" name="spread"><br>
        <a href='http://www.vegasinsider.com/college-football/odds/las-vegas/'>Please input The over-under for the game </a><input type="text" name="ou"><br>
        <a href='http://www.footballoutsiders.com/stats/ncaaol'>Please input the Offensive line Opurtunity Rate </a><input type="text" name="olor"><br>
        <a href='http://www.footballoutsiders.com/stats/ncaadl'>Please input the Opponents Deffensive line Opurtunity Rate </a><input type="text" name="dlor"><br>
        <a href='https://www.teamrankings.com/college-football/stat/rushing-yards-per-game'>Please input the Average rushing yards for the year</a><input type="text" name="ty"><br>
        <a href='http://www.donbest.com/ncaaf/injuries/'>Coming off Injury?</a><select name="i">            
            <option value="0">NO</option>
            <option value="1">YES</option>
        </select><br>
        Primary Back?<select name="pb">
            <option value="1">YES</option>
            <option value="0">NO</option>
        </select><br>
        Home team?<select name="home">
            <option value="1">YES</option>
            <option value="-1">NO</option>
        </select><br>
        <br>
        
        <input type="submit">
    </div>
    <?php 
    //This is error display balues
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
