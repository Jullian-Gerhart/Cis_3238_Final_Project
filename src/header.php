<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<?php
    if(!file_exists("cookies.txt")){
        header("Location: index.php");
        exit();
    }
?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>College Algorithm</title>
</head>
 
<body>
<div id="header">
    <h1>College Algorithm</h1>
    <ul class="header">
        <li class="header"><a href="#">Home</a></li>
        <li class="header" ><a href="#">Articles</a></li>
        <li class="header"><a href="#">Portfolio</a></li>
    </ul>
    <hr>
 
</div>
