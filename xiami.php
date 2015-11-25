<?php
function getLocation($location){
        $loc_2 = (int)substr($location, 0, 1);
        $loc_3 = substr($location, 1);
        $loc_4 = floor(strlen($loc_3) / $loc_2);
        $loc_5 = strlen($loc_3) % $loc_2;
        $loc_6 = array();
        $loc_7 = 0;
        $loc_8 = '';
        $loc_9 = '';
        $loc_10 = '';
        while ($loc_7 < $loc_5){
            $loc_6[$loc_7] = substr($loc_3, ($loc_4+1)*$loc_7, $loc_4+1);
            $loc_7++;
        }
        $loc_7 = $loc_5;
        while($loc_7 < $loc_2){
            $loc_6[$loc_7] = substr($loc_3, $loc_4 * ($loc_7 - $loc_5) + ($loc_4 + 1) * $loc_5, $loc_4);
            $loc_7++;
        }
        $loc_7 = 0;
        while ($loc_7 < strlen($loc_6[0])){
            $loc_10 = 0;
            while ($loc_10 < count($loc_6)){
                $loc_8 .= isset($loc_6[$loc_10][$loc_7]) ? $loc_6[$loc_10][$loc_7] : null;
                $loc_10++;
            }
            $loc_7++;
        }
        $loc_9 = str_replace('^', 0, urldecode($loc_8));
        return $loc_9;
    }

function getHtml($sid){
    $url = 'http://www.xiami.com/widget/xml-single/sid/'.$sid;
    $info=file_get_contents($url);
    preg_match('/<location><!\[CDATA\[(.*)]]><\/location>/', $info, $m);
    return $m[1];

}
$sid = $_GET["sid"];
$res = getHtml($sid);


$testj = getLocation($res);
if (isset($testj))
{
Header("HTTP/1.1 303 See Other");
Header("Location: $testj");
exit;
} 


?>