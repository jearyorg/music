<?php
session_start();

 $username = $_SESSION['username'];
 if(!$username){
   echo 'error!';
   die();
 }
//echo 'success!  <a href="./login.php?action=logout">Quit</a>';
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>音乐后台管理 - Jeary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
     <link href="http://cdn.bootcss.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      li {

        margin-top: 3px;
      }
    </style>
    <link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../bootstrap/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">


        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <ul class="nav nav-list">
        <li class="nav-header">
          功能列表
        </li>
        <li onclick="changeCss(this)" class="active">
          <a href="./page/welcome.html" target="iframe_right">首页</a>
        </li>
        <li onclick="changeCss(this)">
          <a href="./page/addsong.html" target="iframe_right">添加歌曲</a>
        </li>
        <li onclick="changeCss(this)">
          <a href="./page/songmanage.php" target="iframe_right">管理歌曲</a>
        </li>
        <li>
          <a href="#">建设中</a>
        </li>
        <li class="nav-header">
          其他
        </li>
        <li>
          <a href="#">资料</a>
        </li>
        <li>
          <a href="#">设置</a>
        </li>
        <li class="divider">
        </li>
        <li>
          <a href="#">帮助</a>
        </li>
      </ul>
    </div>
    <div class="span6" style="margin-top: -50px;">
       <iframe src="./page/welcome.html" id="iframe_right" name="iframe_right" width="168%" height="1000px" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>
    </div>
  <!--  <div class="span4">
    
    </div>-->
  </div>
</div>
<script>
function changeCss(obj){
  $('li').each(function(i,item){
      if ( item.className == 'active'){
          item.className="";
      }
  })
  obj.className="active";
}
  
</script>
 
     



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/js/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap-transition.js"></script>
    <script src="./bootstrap/js/bootstrap-alert.js"></script>
    <script src="./bootstrap/js/bootstrap-modal.js"></script>
    <script src="./bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="./bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="./bootstrap/js/bootstrap-tab.js"></script>
    <script src="./bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="./bootstrap/js/bootstrap-popover.js"></script>
    <script src="./bootstrap/js/bootstrap-button.js"></script>
    <script src="./bootstrap/js/bootstrap-collapse.js"></script>
    <script src="./bootstrap/js/bootstrap-carousel.js"></script>
    <script src="./bootstrap/js/bootstrap-typeahead.js"></script>

  

</body></html>