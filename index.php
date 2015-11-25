<?php
header("Content-type: text/html; charset=utf-8");
$keyword = addslashes(urldecode($_GET['keyword']));
var_dump($keyword);
echo '<script>var keyword="'.$keyword.'";</script>';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Music for Self</title>

<!-- 标签云样式、JS -->
	<link rel="stylesheet" type="text/css" href="./linkyun/miaov_style.css" />
	<script type="text/javascript" src="./linkyun/miaov.js"></script>


	<link rel="stylesheet" href="css/stylesheets/style.css">
        <link rel="shortcut icon" href="/favicon.ico"/>
        <link rel="bookmark" href="/favicon.ico"/>
	<script src="js/jquery172.js"></script>

</head>
<body>

	<div id="background"></div>


<div style="margin-left: -23%;">
<div style="">
	<div id="player">
		<div class="cover"></div>
		<div class="ctrl">
			<div class="tag">
				<strong>Title</strong>
				<span class="artist">Artist</span>
				<span class="album">Album</span>
			</div>
			<div class="control">
				<div class="left">
					<div class="rewind icon"></div>
					<div class="playback icon"></div>
					<div class="fastforward icon"></div>
				</div>
				<div class="volume right">
					<div class="mute icon left"></div>
					<div class="slider left">
						<div class="pace"></div>
					</div>
				</div>
			</div>
			<div class="progress">
				<div class="slider">
					<div class="loaded"></div>
					<div class="pace"></div>
				</div>
				<div class="timer left">0:00</div>
				<div class="right">
					<div class="repeat icon"></div>
					<div class="shuffle icon"></div>
				</div>
			</div>
		</div>

	</div>
	<ul id="playlist" style=""> 
	<p style="margin-left:80%"><a href="http://music.jeary.org">换一换~</a></p></ul>
	
</div>  <!-- left div  -->


<div id="div1" style="position:absolute; left:60%;top:20%;">
	<a href="./index.php?keyword=丁当">丁当</a>
	<a href="./index.php?keyword=周杰伦">周杰伦</a>
	<a href="./index.php?keyword=刘若英">刘若英</a>
	<a href="./index.php?keyword=伤感">伤感</a>
	<a href="./index.php?keyword=怀旧">怀旧</a>
	<a href="./index.php?keyword=嗨~">嗨~</a>
<a href="./index.php?keyword=民谣">民谣</a>
</div>

</div>



	<footer>
		<p class="keTxtP">2015(C) <strong><a href="http://muisc.jeary.org/" target="_blank" title="">Music</a></strong>  Powered by Jeary<strong></strong>&#160;&#160;&#160;&#160;<script language="javascript" type="text/javascript" src="http://js.users.51.la/17829709.js"></script>
<noscript><a href="http://www.51.la/?17829709" target="_blank"><img alt="我要啦免费统计" src="http://img.users.51.la/17829709.asp" style="border:none" /></a></noscript> </p>
	</footer>

	
	<script src="js/jquery-ui-1.8.17.custom.min.js"></script>
	<script src="js/script2.js"></script>

</body>
</html>
