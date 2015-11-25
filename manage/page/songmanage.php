<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
     <link href="http://cdn.bootcss.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../bootstrap/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

  </head>


  <body>

  <div class="container-fluid">
  <div class="row-fluid">
    <div class="span10">
     <table class="table table-striped table-condensed" contenteditable="true" id="res_table">
        <thead>
          <tr>
            <th>
              编号
            </th>
            <th>
              歌曲名
            </th>
            <th>
              歌手
            </th>
            <th>
              专辑
            </th>
            <th>
              歌曲ID
            </th>
             <th>
              歌曲源
            </th>
            <th>
              风格标签
            </th>

             <th>
              功能
            </th>

          </tr>
        </thead>
        <tbody id="res_tbody">
      
        </tbody>
      </table>

    <div class="pagination">
        <ul id="page"></ul>
      </div>

    </div>
    <div class="span4">
    </div>
  </div>
</div>






    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap-transition.js"></script>
    <script src="../bootstrap/js/bootstrap-alert.js"></script>
    <script src="../bootstrap/js/bootstrap-modal.js"></script>
    <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../bootstrap/js/bootstrap-tab.js"></script>
    <script src="../bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../bootstrap/js/bootstrap-popover.js"></script>
    <script src="../bootstrap/js/bootstrap-button.js"></script>
    <script src="../bootstrap/js/bootstrap-collapse.js"></script>
    <script src="../bootstrap/js/bootstrap-carousel.js"></script>
    <script src="../bootstrap/js/bootstrap-typeahead.js"></script>

  

</body>


<script type="text/javascript">  
$(document).ready(function() {  
    $.ajax({  
        //请求方式为get  
        type:"GET",  
        //json文件位置  
        url:"../showsong.php",
        data:{p:<?php echo $_GET['p']?$_GET['p']:1;?>},
        //返回数据格式为json  
        dataType: "json",  
        //请求成功完成后要执行的方法  
        success: function(data){
          // alert(data);
            //使用$.each方法遍历返回的数据date,插入到id为#result中  
            $.each(data.list,function(i,item){  
              //alert(i);
                var content = '<tr class="info">'+
              '<td>'+
              item.sid+
            '</td>'+
            '<td>'+
              item.stitle+
            '</td>'+
            '<td>'+
             item.sartist+
            '</td>'+
            '<td>'+
             item.salbum+
            '</td>'+
             '<td>'+
              item.songid+
            '</td>'+
            '<td>'+
             item.songfrom+
            '</td>'+
            '<td>'+
             item.stag+
            '</td>'+
             '<td>'+
              '<button class="btn btn-small btn-danger" type="button" onclick="delSong('+item.sid+');">删除</button>'+
            '</td>'+
          '</tr>';
                $("#res_tbody").append(content);  
            })
            $("#page").html(data.page);
        }  
    })  
});

function delSong( sid )
{
 var isDel=confirm('是否删除？');
 if(isDel){
    location.href='../delsong.php?sid='+sid;
}
}
</script> 


</html>