<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="lar.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://mcmyskin.googlecode.com/files/cufon-yui.js" type="text/javascript"></script> 
<?php
 if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){
	echo '<script src="http://mcmyskin.googlecode.com/files/font.FZZhunYuan.js?r=1" type="text/javascript"></script>';
 }else{
	echo '<script src="http://mcmyskin.googlecode.com/files/font.ShiShangZhongHeiJianTi3.js?r=1" type="text/javascript"></script>';
 }
?>
<script type="text/javascript">
<?php
 if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){
	echo "Cufon.replace('.cufon', { fontFamily : \"FZZhunYuan-M02T\", separate : \"characters\", hover : true });";
 }else{
	echo "Cufon.replace('.cufon', { fontFamily : \"ShiShangZhongHeiJianTi\", separate : \"characters\", hover : true });";
 }
?>
$(document).ready(function(){
  $("table").hide();
  $("table").fadeIn();
});
function refresh(){
window.parent.location.href=window.parent.location.href;
}
function jumpto(url){
	window.location.href=url; 
}
function refresh2(){
    window.location.href=window.location.href; 
}
</script>
</head>

<body>
<?php
include('mysql.php');
$con = newlink("widesens_mms");
mysql_query("SET NAMES utf8");

if(!isset($_SESSION["uid"])){echo "<br /><p>玩啥呢！你坑爹呢！没登陆你怎么打开的这个页面？你把地址记录下来了打算取巧！坑爹呢！</p>";
}else{

if(isset($_POST["submit"])){
	 $num = mysql_fetch_row(mysql_query("select count(username) from userbase where username='".$_SESSION["username"]."'"));
	 if(!$num[0] > 0){echo "<br /><p class='cufon'>用户名没有被注册！</p>";}
	 else{
     $genuine = file_get_contents_curl("http://www.minecraft.net/haspaid.jsp?user=".trim($_SESSION["username"]));
	 if($genuine=="true"){
     $pass = file_get_contents_curl("https://login.minecraft.net/?user=".trim($_SESSION["username"])."&password=".$_POST["password"]."&version=12");
	 if(preg_match("/^Bad/",$pass)){echo("<br /><p class='cufon'>密码错误！</p>");}
	 else{
	 $pass = explode(":",$pass);
	 if(strtolower($pass[2])==strtolower($_SESSION["username"])){
		  mysql_query("UPDATE userbase SET genuine = 1 where username = '".$_SESSION["username"]."'");
		  $_SESSION["genuine"]=1;
		  echo "<br /><p class='cufon'>认证成功！</p>";
		  echo "<script>";
          echo  "setTimeout('refresh()',1000); ";
          echo "</script>";
	 }else{ echo "<br /><p class='cufon'>帐号大小写要与官方保持一致！</p>";}
	 }
     }else{ echo "<br /><p class='cufon'>该帐号不是正版帐号！</p>";}
	 }
}else{
	if($_SESSION["genuine"]==1){echo "<br /><p class='cufon'>你已经是正版帐号了！</p>";
	}else{

?>
<table width="577" height="311" border="0" align="center" cellspacing="0">
  <tr>
    <th height="47" colspan="2" bgcolor="#3333FF" class="MMSLogin" scope="col"><font class="cufon">正版认证</font></th>
  </tr>
  <tr>
    <td width="439" bgcolor="#3366FF" class="lChoose"><form action="" method="post">
      <p class="leftInfo"><font class="cufon">如果你是正版用户，您的帐号可以通过这个认证成为MMS的正版帐号。</font></p>
      <table width="363" height="124" border="0" align="center">
      <tr>
        <td class="LoginInfo"><font class="cufon">密码</font></td>
        <td colspan="2"><label for="password"></label>
          <input name="password" placeholder="请输入您的官方密码" type="password" class="fTextBox" id="password" size="35" maxlength="16" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="157"><input type="submit" name="submit" id="submit" value="    认证    " /> </td>
      </tr>
</table>
    </form></td>
  </tr>
</table>
<?php
	}
}
}
?>
</font>
</body>
</html>
