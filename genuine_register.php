<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<title>Register Form</title>
<link rel="stylesheet" type="text/css" href="lar.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="register.js"></script>

<script src="http://mcmyskin.googlecode.com/files/cufon-yui.js" type="text/javascript"></script> 
<?php
 if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){
	echo '<script src="http://mcmyskin.googlecode.com/files/font.FZZhunYuan.js?r=1" type="text/javascript"></script> ';
 }else{
	echo '<script src="http://mcmyskin.googlecode.com/files/font.ShiShangZhongHeiJianTi3.js?r=1" type="text/javascript"></script> ';
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
function captcha(){
      $.post("proxy.php",{"refresh": "true" },function(result){
	    $("#tokencheck").attr("value",result);
	    $("#captcha").attr("src","http://captcha.duapp.com/image/"+result+".png");});
	  setTimeout('Reload()',55000);
}
</script>
</head>
<body onload="captcha();">
<?php
date_default_timezone_set('PRC');
include('mysql.php');
$con = newlink("widesens_mms");
mysql_query("SET NAMES utf8");

   function process_form($data){
	   $query1 = "INSERT INTO userbase(`username`, `email`, `registerdate`, `registerip`, `lastlogindate`, `lastloginip`) VALUES ('".$data["username"]."','".$data["email"]."','".date("Y-m-d H:i:s")."','".$_SERVER["REMOTE_ADDR"]."','".date("Y-m-d H:i:s")."','".$_SERVER["REMOTE_ADDR"]."')";
	   $query2 = "INSERT INTO `mmsusers`(`username`, `password`) VALUES ('".$data["username"]."','".md5($data["password"])."')";
	   if( !mysql_query($query1) || !mysql_query($query2) ){echo "<br /><p class='cufon'>注册失败！</p>";}
	   else{
		  echo "<br /><p class='cufon'>注册正版账户成功！皮肤上限+6。</p>";
		  $uid = mysql_fetch_row(mysql_query("SELECT uid from mmsusers where username = '".$data["username"]."'"));
		  if(is_int($uid[0]/100)){
			  if(is_int($uid[0]/1000)){
				  echo "恭喜您成为MMS的第".$uid[0]."位注册用户，皮肤上限+6。";
				  mysql_query("UPDATE `userbase` SET `groupid`=7 WHERE uid='".$uid[0]."'");
			  }else{
				  echo "恭喜您成为MMS的第".$uid[0]."位注册用户，皮肤上限+2。";
				  mysql_query("UPDATE `userbase` SET `groupid`=3 WHERE uid='".$uid[0]."'");
			  }
		  }
		  $groupid = mysql_fetch_row(mysql_query("SELECT groupid from userbase where username = '".$data["username"]."'"));
		  mysql_query("UPDATE mmsusers SET uid = ".$uid[0]." where username = '".$data["username"]."'");
		  mysql_query("UPDATE userbase SET genuine = 1 where username = '".$data["username"]."'");
		  $_SESSION["uid"]=$uid[0];
		  $_SESSION["username"]=$data["username"];
		  $_SESSION["groupid"]=$groupid[0];
		  $_SESSION["genuine"]=1;
		  echo "<script>";
          echo  "setTimeout('refresh()',500); ";
          echo "</script>";
	   };
   }


if(isset($_POST["submit"])){
  $auth = file_get_contents_curl("http://captcha.duapp.com/auth/".$_POST["tokencheck"].",".$_POST["CAPTCHAcheck"]);
  $auth = explode("\n",$auth);
  if(!$auth[0] == 0){echo "<br /><p class='cufon'>验证码错误</p>";}
  else{
	 $num = mysql_fetch_row(mysql_query("select count(username) from userbase where username='".$_POST["username"]."'"));
	 if($num[0] > 0){echo "<br /><p class='cufon'>用户名已存在！</p>";}
	 else{
     $genuine = file_get_contents_curl("http://www.minecraft.net/haspaid.jsp?user=".trim($_POST["username"]));
	 if($genuine=="true"){
     $pass = file_get_contents_curl("https://login.minecraft.net/?user=".trim($_POST["username"])."&password=".$_POST["password"]."&version=12");
	 if(preg_match("/^Bad/",$pass))die("<br /><p class='cufon'>密码错误！</p>");
	 $pass = explode(":",$pass);
	 if($pass[2]===$_POST["username"]){
	   $num = mysql_fetch_row(mysql_query("select count(email) from userbase where email='".$_POST["email"]."'"));
	   if($num[0] > 0){echo "<br /><p class='cufon'>邮箱已被使用！</p>";}
	   else{
                      if (!strlen($_POST["email"]) > 6 || !preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/i", $_POST["email"])) {
                         echo "<br /><p class='cufon'>邮箱格式不正确！</p>";
                       } else {
                         process_form($_POST);
                       }
	   }
	}else{ echo "<br /><p class='cufon'>帐号大小写要与官方保持一致！</p>";}
    }else{ echo "<br /><p class='cufon'>该帐号不是正版帐号！请使用MMS的普通注册功能！</p>";}
	}
  }
}else{
	if(isset($_SESSION["uid"])){echo "<br /><p class='cufon'>你已经登录了！</p>";
	}else{
?>
<table width="577" border="0" align="center" cellspacing="0">
  <tr>
    <th height="47" bgcolor="#3333FF" class="MMSLogin" scope="col"><font class="cufon">正版用户注册</font></th>
  </tr>
  <tr>
    <td width="439" height="261" bgcolor="#3366FF" class="lChoose"><form action="" method="post">
      <p class="leftInfo"><font class="cufon">MMS将直接向Mojang验证正版用户有效性！</font></p>
      <table width="404" height="124" border="0" align="center">
        <tr>
          <td width="117" class="LoginInfo" scope="col"><font class="cufon">用户名</font></td>
          <td colspan="2" scope="col"><input name="username" placeholder="请输入你的正版ID" type="text" class="fTextBox" id="username" size="35" maxlength="16" /></td>
          </tr>
        <tr>
          <td class="LoginInfo"><font class="cufon">密码</font></td>
          <td colspan="2"><label for="repassword"></label>
            <input name="password" placeholder="请输入你的密码" type="password" class="fTextBox" id="password" size="35" maxlength="16" /></td>
          </tr>
        <tr>
          <td class="LoginInfo"><font class="cufon">电子邮箱</font></td>
          <td colspan="2"><label for="repassword"></label>
            <input name="email" placeholder="该项用于找回密码" type="text" class="fTextBox" id="email" size="35" /></td>
          </tr>
        <tr>
          <td class="LoginInfo"><font class="cufon">验证码</font></td>
          <td width="114"><label for="repassword"></label>
            <input name="CAPTCHAcheck" placeholder="输入右图所示字符" type="text" class="fTextBox" id="CAPTCHAcheck" size="16" maxlength="16" /></td>
            <input name="tokencheck" type="hidden" id="tokencheck" value=""/>
          <td width="159"><a href="#" onclick="Reload();"><img src="http://captcha.duapp.com/image/0.png" alt="点击刷新..." width="124" height="24" id="captcha" /></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" id="submit" value="  提交  " /> </td>
          <td class="backtologin"><a href="./login.php"><font class="cufon">返回登录</font></a></td>
        </tr>
    </table>
    </form></td>
  </tr>
</table>
<?php
	}
}
?>
</body>
</html>
