<?php require_once("src/header.php"); include 'function.php'; ?>
<style>
<?php include 'public_html/css/main.css'; ?>
</style>

<div class="body">
    <div id="content">
        Welcome to the college football algorithm!
        <ul>
        <?php 
        $username = "null";//Read in user 
        if(!empty($_GET["user"])){
            $username = $_GET["user"];
        }else{
            $lines = file("cookies.txt");
            foreach ($lines as $line_num => $line){
                list($tag, $value) = explode('|',$line);//If not read in the cookie to get user
                if($tag == "USERNAME"){
                    $username = $value;
                }
            }
        }
        if(isAdmin($username) == 1){
                echo "<li><a href='manage_accounts.php'>Manage Acounts</a>"; //If admin display this
        }
        ?>
            <li><a href="week_rb.php">Running backs by week</a></li>
        </ul>
    </div>
    <?php //require_once("src/rightPanel.php"); ?>
</div>
<?php
    //require_once("src/footer.php");
?>