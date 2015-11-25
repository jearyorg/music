<?php
header("Content-type: text/html; charset=utf-8");
session_start();
if($_SESSION['username'] && $_SESSION['userid']){
    header("Location: ./main.php"); 
}
else
{
    header("Location: ./login.php"); 
}
?>
