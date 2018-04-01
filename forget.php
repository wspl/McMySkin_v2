<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<title>Find Password</title>
<link rel="stylesheet" type="text/css" href="lar.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("table").hide();
  $("table").fadeIn();
});
function refresh(){
window.parent.parent.location.href="index.php";
}
</script>
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
</script>

</head>
<body>
<font class="cufon">
<?php
date_default_timezone_set('PRC');
require( "class.phpmailer.php" );
require( "class.smtp.php" );
include('mysql.php');

if(isset($_POST["submit"])){
	if($_POST["username"]=="" || $_POST["email"]=="" ){die("信息请填写完整！");}
  if (!preg_match("/^[a-zA-Z0-9][a-zA-Z0-9_]{2,11}$/i",$_POST["username"])) {
    echo "<br /><p class='cufon'>用户名只能是英文字母、数字和_且必须是字母或数字开头！</p>";
  } else {
  $con = newlink("widesens_mms");
  $trueemail = mysql_fetch_row(mysql_query("SELECT email from userbase where username='".$_POST["username"]."'"));
  $password = mysql_fetch_row(mysql_query("SELECT password from mmsusers where username='".$_POST["username"]."'"));
  if($_POST["email"]==$trueemail[0]){


 //********************初始化发邮件参数**************************//
  $x = md5($_POST["username"].'+'.$password[0]);
  $String = base64_encode($_POST["username"].".".time().".".$x);
  $message = '请在三小时内点击以下链接重新设定密码：';
  $message.= '<a href="http://'.$_SERVER["HTTP_HOST"].'/resetpw.php?p='.$String.'">http://'.$_SERVER["HTTP_HOST"].'/resetpw.php?p='.$String.'</a>';
  //发送邮件
  $headers['From']    = 'mcmyskin@163.com';               //发信地址 
  $headers['To']      = trim($_POST["email"]);           //收信地址 
  $headers['Subject'] = 'McMySkin User Info';               //邮件标题 
  $mail = new PHPmailer;
  $mail->IsSMTP(); // set mailer to use SMTP
  $mail->SMTPAuth = true;
  $mail->CharSet = "utf8"; 
  $mail->Username = "mcmyskin"; 
  $mail->Password = "mcmyskin25565"; 
  $mail->From = $headers['From'];
  $mail->FromName = "McMySkin";
  $mail->Host = "smtp.163.com"; 
  $mail->AddAddress( $headers['To'], $_POST["username"] );
  $mail->IsHTML(true);    // set email format to HTML
  $mail->Subject = $headers['Subject'];
  $mail->Body = $message;
  $mail->AltBody  =  "请使用HTML方式查看邮件。";  
 //********************初始化发邮件参数**************************//

    if($mail->Send()){      //检测错误
     echo "邮件发送成功，请查收！";
    }else{ echo $mail->ErrorInfo;}
  }else{die("用户名与邮箱不匹配！");}
  }
}else{
?>
<table width="577" border="0" align="center" cellspacing="0">
  <tr>
    <th height="47" bgcolor="#3333FF" class="MMSLogin" scope="col">找回密码</th>
  </tr>
  <tr>
    <td height="261" bgcolor="#3366FF"><table width="480" height="214" border="0" align="center">
      <tr>
        <td width="474" height="93">提示：如要找回密码，必须知道您的用户名、电子邮箱，还必须有能力登录该电子邮箱。 如果您失去了以上任何一个条件你都无法找回密码。</td>
      </tr>
      <tr>
        <td><form action="" method="post"><table width="387" height="98" border="0" align="center">
          <tr>
            <td width="99">用户名</td>
            <td width="278"><label for="username"></label>
              <input name="username" placeholder="请输入注册时填写的用户名" type="text" id="username" size="40" maxlength="16" /></td>
          </tr>
          <tr>
            <td>电子邮箱</td>
            <td><label for="email"></label>
              <input name="email" type="text" placeholder="请输入注册时填写的电子邮箱地址" id="email" size="40" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" id="submit" value="提交申请" /></td>
          </tr>
        </table></form></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
}
?>
</font>
</body>
</html>
