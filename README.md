# 简易云歌单
##

为了听歌方便弄的一个简单的网站~~

安装：
0.将项目文件放入nginx网站目录下

1.修改conn.php，配置数据库连接信息

2.连接数据库，创建一个数据库名字为smusic，执行smusic.sql文件创建表

3.添加测试数据
eg:

INSERT INTO 'juser' VALUES (1, 'admin', 'admin', NOW());

INSERT INTO `jsong` VALUES (1, 'I Have Nothing', 'Whitney Houston', 'Love, Whitney', 'http://img.xiami.net/images/album/img27/11627/2161501375695126_2.jpeg', 'http://127.0.0.1/xiami.php?sid=2554137\r\n', '嗨~')

4.访问http://127.0.0.1/manage/

（Demo:Music Jeary(http://music.jeary.org)）

Enjoy this~~~

