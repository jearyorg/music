<?php
session_start();
header("Content-type: text/html; charset=utf-8");
 $username = $_SESSION['username'];
 if(!$username){
   echo 'error!';
   die();
 }
include('conn.php');
$br = "<br/>";
$stitle = addslashes($_POST['stitle']);
$sartist = $_POST['sartist'];
$salbum = $_POST['salbum'];
$scover = $_POST['scover'];
$jsongid = $_POST['jsongid'];
$musicfrom = $_POST['musicfrom'];
$songtag = $_POST['songtag'];
$songurl = "http://music.jeary.org/".$musicfrom.".php?sid=".$jsongid;

$sql = "INSERT INTO jsong (stitle,sartist,salbum,scover,smp3,stag) VALUES ('$stitle','$sartist','$salbum','$scover','$songurl','$songtag')"; 
 if (!mysql_query($sql,$conn))
 {
   die('Error: ' . mysql_error());
 }
header("Location: ./page/addsong.html");
 //echo '添加成功歌曲《'.$stitle.'》成功！点击此处 <a href="javascript:history.back(-1);">返回</a>';
?>
