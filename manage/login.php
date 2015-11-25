<?php
session_start();
if($_SESSION['username'] && $_SESSION['userid']){
  header("Location: ./main.php"); 
}
header("Content-type: text/html; charset=utf-8");
//注销登录
include('conn.php');
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    header("Location: ./login.php"); 
    exit;
}
if( $_POST )
{
  $username = addslashes($_POST['username']);
  $password = addslashes($_POST['password']);
  //包含数据库连接文件
  //检测用户名及密码是否正确
  $sql = "select * from juser where username='$username' and password='$password'";
  $check_query = mysql_query($sql);
  //echo $sql;
  if($result = mysql_fetch_array($check_query)){
      //登录成功
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $result['uid'];
      header("Location: ./main.php"); 
     // echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
      //echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
      exit;
  } 
}

?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
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
    <div class="container">
      <form class="form-signin" action="./login.php" method="POST">
        <h3 class="form-signin-heading">后台登陆</h3>
        <input class="input-block-level" placeholder="Username" type="text" name="username">
        <input class="input-block-level" placeholder="Password" type="password" name="password">
        <label class="checkbox">
          <input value="remember-me" type="checkbox"> 记住我
        </label>
        <input class="btn btn-large btn-primary" type="submit" name="submit" value="登陆" />
      </form>

    </div> <!-- /container -->

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