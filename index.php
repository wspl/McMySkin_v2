<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>McMySkin 皮肤中心</title>
<?php
 include ('header.php');
?>
</head>
<?php
  $indextitle = '<strong class="zPageTitle cufon">主页</strong>';
  include("bases.php");
  include('mysql.php');
  $con = newlink("widesens_mms");
  mysql_query("SET NAMES utf8");
  $res = mysql_query("SELECT * FROM broadcast WHERE available = 1 ORDER BY id DESC");
  while($broadcast = mysql_fetch_array($res,MYSQL_ASSOC)){
	  $broadcasts .= '[ '.$broadcast["date"].' ]  '.$broadcast["broadcast"];
	  for($i=0;$i<40;$i++){
		$broadcasts .= "&nbsp;";
	  }
  }
?>
<body>
<SCRIPT language=JavaScript>
document.onselectstart=new Function("event.returnValue=false;");
</SCRIPT>
        <br />
        <br />
<table border="0" align="center" class="mainbody">
  <tr>
      <td id="cube1" class="mmsTitle" scope="col">
      <a href="index.php"><img src="Image/logo.png" name="logo" id="logo" /></a>
      </td>
      <td id="cube2" scope="col">
      <p id="indextitle"><?php echo $indextitle; ?></p>
      </td>
  </tr>
  <tr>
      <td id="cube3" class="MainInfo">
    <div id="MainPage">
      <p>&nbsp;</p>
      <p><font style="font-size:36px" class='cufon'>欢迎来到McMySkin皮肤中心</font></p>
      <p class="MainTitle2"><font class='cufon'>Welcome to MMS(McMySkin) Skin Hub</font></p>
      <p class="MainTitle2">&nbsp;</p>
      <p class="MainTitle2"><font class='cufon'>这里是一个免费的寄存平台，您可以上传您的Minecraft皮肤至我们的服务器，我们可以将皮肤显示在您的Minecraft游戏里。</font></p>
      <p class="MainTitle2"><font class='cufon'>开始使用McMySkin，请<a class="various fancybox.iframe" href="./register.php"><u><strong>注册</strong></u></a>一个新账户...</font></p>
      <p class="MainTitle2">&nbsp;</p>
      <p class="MainTitle2">&nbsp;</p>
    </div>
      </td>
    <td id="cube4" style="vertical-align:top">
    <font class='cufon'>
    <table>
    <tr>
    <td style="vertical-align:top; padding-top:5px;">
        <table id="button" border="0" align="center">
        <tr>
          <td width="70" scope="col"><img src="<?php echo $avatar; ?>" width="64" height="64" class="amenu" id="avatar" /></td>
          <td width="130" height="77" colspan="2" scope="col" id="username"><?php echo $username; ?></td>
        </tr>
   <?php
       foreach($userinfo as $info){
         echo '<tr class="userinfo">';
         echo $info;
         echo '</tr>';
	   }
   ?>
        </table>
    </td>
    </tr>
    <tr>
    <td style="vertical-align: bottom; padding-top:15px;padding-bottom:5px;">
      <table id="button" height="249" border="0" align="center">
   <?php
       foreach($button as $info){
         echo '<tr>';
         echo $info;
         echo '</tr>';
	   }
   ?>
      </table>
    </td>
    </tr>
    </table>
      </font>
    </td>
  </tr>
  <tr>
    <td height="74" colspan="2" class="mmsFooter"><table width="977" height="85" border="0" cellspacing="0">
      <tr>
        <td height="26" colspan="8" bgcolor="#0B42D5"><span class="friend">友情链接</span></td>
        </tr>
      <tr class="friend">
   <?php
       foreach($friends as $friend){
         echo $friend;
	   }
   ?>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
      <td height="74" colspan="2" class="mmsFooter">
        <font class='cufon'><?php echo $footer; ?></font>
      </td>
  </tr>
</table><p></p>
<div id="footer">		
<div id="bottom">
<marquee behaviour="Scroll"><font color="#FFFFFF"><?php echo $broadcasts; ?></font></marquee>
</div>
</div>
<script type='text/javascript' src="http://fancyapps.com/fancybox/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css" />
</body>
</html>
