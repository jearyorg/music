<?php
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
session_start();
header("Content-type: text/html; charset=utf-8");
 $username = $_SESSION['username'];
 if(!$username){
   echo 'error!';
   die();
 }
include('conn.php');


$count_sql = "SELECT COUNT(*) AS count FROM jsong";  

$result_pag_num = mysql_query($count_sql);   

$row = mysql_fetch_array($result_pag_num);

$count = $row['count']; //总记录数量
#echo "总记录：".$count."<br/>";

$fnum = 15;  //每页显示数量

$pagenum = ceil($count / $fnum);  //翻页数

@$page = $_GET['p'];   //页数参数


if ($page == "") {   //计算页数
    $num = 0;  
} else {  
    $num = ($page - 1) * $fnum;  
} 

$song_data_sql = "SELECT * from jsong order by sid LIMIT $num, $fnum";   //查询SQL
#echo $song_data_sql;

$result = mysql_query($song_data_sql,$conn) or die(mysql_error());  //执行得到结果集


$arrList = array();   //新建arrList

#var_dump($result);
//构造json
while($row = mysql_fetch_array($result)){
//	$test = parse_url($row['smp3']);
   // $songid = str_replace(array("_"),"",explode("=",$test['query'])[1]);
  //  $songfrom = str_replace(array("/",".php"),"",$test['path']);
//$songid = substr($str,strpos($str,"=")),"=");
$str = $row['smp3'];
    $songid = ltrim(substr($str,strpos($str,"=")),"=");
$songfrom='xiami';
        array_push($arrList, array("sid" => $row["sid"],"stitle" => $row['stitle'],"sartist" => $row['sartist'],"salbum" => $row['salbum'],"scover" => $row['scover'],"songid" => $songid,"songfrom" => $songfrom,"stag" => $row['stag']));
}
include('./common/Page.class.php');
$obj_page = new Page($count,15);
$resList['page'] = $obj_page->show();
$resList['list'] = $arrList;

//输出json
echo json_encode ($resList);
?>
