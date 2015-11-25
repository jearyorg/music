<?php
header('Content-type: text/html');
include('./config/conn.php');

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1; 
if(!preg_match('/^\d+$/',$page) || $page < 1) $page = 1;

$pageSize = 10;
$query_pag_num = "SELECT COUNT(*) AS count FROM jsong";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $pageSize);

if($page > $no_of_paginations) $page = $no_of_paginations;  

$start = ($page - 1) * $pageSize;

$keyword = addslashes($_REQUEST['keyword']);
 
if (isset($_COOKIE['lastrun'])&&$keyword=='all'){
	$query_pag_data = "SELECT stitle,sartist,salbum,scover,smp3,stag from jsong order by rand() LIMIT $start, $pageSize";
}elseif($keyword){
	$query_pag_data = "SELECT stitle,sartist,salbum,scover,smp3,stag from jsong where stag ='".$keyword."' order by rand() LIMIT 0,10;";
	//echo $query_pag_data;
}
else {
$query_pag_data = "SELECT * from jsong order by rand() LIMIT 0, 10;";
setcookie('lastrun',time());
}




$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$arrList = array(); 
while($row = mysql_fetch_array($result_pag_data)){
        array_push($arrList, array("stitle" => $row['stitle'],"sartist" => $row['sartist'],"salbum" => $row['salbum'],"scover" => $row['scover'],"smp3" => $row['smp3'],"stag" => $row['stag']));
}
$array = array(
        "playlist" => $arrList
);
echo json_encode ($array); 

?>
