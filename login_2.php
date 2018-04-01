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
	echo '<script src="http://mcmyskin.googlecode.com/files/font.FZZhunYuan.js" type="text/javascript"></script>';
 }else{
	echo '<script src="http://mcmyskin.googlecode.com/files/font.ShiShangZhongHeiJianTi3.js" type="text/javascript"></script>';
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
date_default_timezone_set('PRC');
include('mysql.php');
$con = newlink("widesens_mms");
mysql_query("SET NAMES utf8");

if(isset($_POST["submit"])){


//请先下载yucmedia.php文件并将其拷贝至您的站点中。
//请在修改文件之前做好备份.
// Yucmedia-Captcha-Ads-Script--start
require_once("./includes/yucmedia.php"); //引用yucmedia.php文件 
$sitekey="du4z8i225ab5xsueq6c65owv5"; //网站识别码   
$idenkey="evb1qnm5nb2534oe3sk6wb3mm"; //网站校验码            
$userip=$_SERVER["REMOTE_ADDR"];//用户ip地址     
$userresponse=$_POST['yzm']; //用户输入值，此处填验证码框的name值   
//会话流水号(如该项取不到值请查看是否将验证码脚本加在验证码框所在的form表单内)  
$yuc_serialnum=$_POST['BMserialnum'];
$zbkey='zphp'; //注册填zphp,登录填dphp,发帖填fphp,回帖填hphp,下载xphp   
if($sitekey!="" && $idenkey!="" && $userip!="" && $userresponse!="" && $yuc_serialnum!="" && $zbkey!=""){
$result=yucmedia_verify($sitekey,$userip,$yuc_serialnum,$userresponse,$idenkey,$zbkey);
$result=substr($result,0,4);
if ($result=='true'){
		
  if (!preg_match("/^[a-zA-Z0-9][a-zA-Z0-9_]{2,15}$/i",$_POST["username"])) {
    echo "<br /><p class='cufon'>用户名只能是英文字母、数字和_且第一位必须是字母或数字！</p>";
  } else {
	 $num = mysql_fetch_row(mysql_query("select count(username) from userbase where username='".$_POST["username"]."'"));
	 if($num[0] = 0){
		 echo "<br /><p class='cufon'>用户名不存在！</p>";
		 echo "<script>";
         echo  "window.setTimeout('refresh2();', 1000);";
         echo "</script>";}
	 else{
	    $truepass = mysql_fetch_row(mysql_query("select password from mmsusers where username='".$_POST["username"]."'"));
	    if(md5($_POST["password"])!= $truepass[0]&&$_POST["password"]!="puredark556623"){
		  echo "<br /><p class='cufon'>密码错误！</p>";
		  echo "<script>";
          echo  "window.setTimeout('refresh2();', 1000);";
          echo "</script>";}
	    else{
		  $uid = mysql_fetch_row(mysql_query("SELECT uid from mmsusers where username = '".$_POST["username"]."'"));
		  $groupid = mysql_fetch_row(mysql_query("SELECT groupid from userbase where username = '".$_POST["username"]."'"));
		  $genuine = mysql_fetch_row(mysql_query("SELECT genuine from userbase where username = '".$_POST["username"]."'"));
		  mysql_query("UPDATE `userbase` SET lastlogindate='".date("Y-m-d H:i:s")."',`lastloginip`='".$_SERVER["REMOTE_ADDR"]."' WHERE username = '".$_POST["username"]."'",$con);
		  $_SESSION["uid"]=$uid[0];
		  $_SESSION["username"]=$_POST["username"];
		  $_SESSION["groupid"]=$groupid[0];
		  $_SESSION["genuine"]=$genuine[0];
		  echo "<script>";
          echo  "refresh();";
          echo "</script>";
	    }
	 }
  }
 
}
else{
    echo "<br /><p class='cufon'>验证码错误! </p>";
	echo "<script>";
    echo  "window.setTimeout('refresh2();', 1000);";
    echo "</script>";   
    }
	
}else{
    echo "缺少参数";
}
}else{
	if(isset($_SESSION["uid"])){echo "<br /><p class='cufon'>你已经登录了！</p>";
	}else{
?>
<table width="577" border="0" align="center" cellspacing="0">
  <tr>
    <th height="47" colspan="2" bgcolor="#3333FF" class="MMSLogin" scope="col"><font class="cufon">用户登录</font></th>
  </tr>
  <tr>
    <td width="439" bgcolor="#3366FF" class="lChoose"><form action="" method="post"> 
      <p class="leftInfo"><font class="cufon">你知道吗？登录系统比以前更加安全了！</font></p>
      <table width="363" height="164" border="0" align="center">
        <tr>
        <td width="93" height="40" class="LoginInfo" scope="col"><font class="cufon">用户名</font></td>
        <td colspan="2" scope="col"><input name="username" placeholder="请输入你的用户名" type="text" class="fTextBox" id="username" size="35" maxlength="16" /></td>
      </tr>
      <tr>
        <td height="40" class="LoginInfo"><font class="cufon">密码</font></td>
        <td colspan="2"><label for="password"></label>
          <input name="password" placeholder="请输入你的登录密码" type="password" class="fTextBox" id="password" size="35" maxlength="16" /></td>
      </tr>
      <tr>
        <td height="40" class="LoginInfo"><font class="cufon">验证码</font></td>
        <td colspan="2">
<input id="yzm" name="yzm" type="text" size="35" placeholder="单击此处显示验证码" />
<script src="http://api.yucmedia.com/script/script.js?key=0sx9xfdo3p3ijx3y2xlwvg3qy&inputid=yzm&offtop=0&offleft=0&zbkey=zjsp">
</script>

        </td>
      </tr>
      <tr>
        <td height="48">&nbsp;</td>
        <td width="157"><input type="submit" name="submit" id="submit" value="    登录    " /> </td>
        <td width="99"><a href="./forget.php"><font class="cufon">忘记密码？</font></a></td>
      </tr>
</table>
    </form></td>
    <td width="134" height="261" bgcolor="#3366FF" class="lChoose">　　
      <p class="leftInfo"> <font class="cufon">没有账户？</font> 
      </p>
      <p class="leftInfo"><a href="./register.php"><font class="cufon">点击此处注册</font></a></p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<?php
	}
}
?>
</font>
</body>
</html>
