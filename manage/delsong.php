<?php
session_start();
header("Content-type: text/html; charset=utf-8");

 $username = $_SESSION['username'];
 if(!$username){
   echo 'error!';
   die();
 }

 include('conn.php');

 $sid = intval($_GET['sid']);
 $sql = "delete from jsong where sid=".$sid;

if (!mysql_query($sql,$conn))
 {
   die('Error: ' . mysql_error());
 }

header("Location: ./page/songmanage.php");

?>