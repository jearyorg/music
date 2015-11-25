<?php
$id = $_GET["sid"];
$url = "http://music.163.com/api/song/detail/?id=" . $id . "&ids=%5B" . $id . "%5D";
$refer = "http://music.163.com/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_REFERER, $refer);
$output = curl_exec($ch);
curl_close($ch);
$output_arr = json_decode($output, true);
$mp3_url = $output_arr["songs"][0]["mp3Url"];
header('Content-Type:audio/mp3');
header("Location:".$mp3_url);
?>