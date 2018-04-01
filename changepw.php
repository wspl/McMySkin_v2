<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<title>Change Password</title>
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
<?php
include('mysql.php');
$con = newlink("widesens_mms");
if(isset($_POST["submit"])){
	    $truepass = mysql_fetch_row(mysql_query("select password from mmsusers where username='".$_SESSION["username"]."'"));
	    if(md5($_POST["oldpw"])!= $truepass[0]){echo "<font class='cufon'>密码错误！</font>";}
		else{
			if($_POST["newpw"]!=$_POST["newpw2"]){
				echo "<font class='cufon'>两次输入的新密码不相同！</font>";
			}else{
				echo "<font class='cufon'>密码修改成功！</font>";
			mysql_query("UPDATE mmsusers SET password ='".md5($_POST["newpw"])."' WHERE username='".$_SESSION["username"]."'");}
		}
}else{
?>
<table width="577" border="0" align="center" cellspacing="0">
  <tr>
    <th height="47" bgcolor="#3333FF" class="MMSLogin" scope="col"><font class='cufon'>修改密码</font></th>
  </tr>
  <tr>
    <td height="261" bgcolor="#3366FF"><table width="480" height="214" border="0" align="center">
      <tr>
        <td width="474"><form action="" method="POST"><table width="387" height="98" border="0" align="center">
          <tr>
            <td width="99"><font class='cufon'>原密码</font></td>
            <td width="278"><label for="oldpw"></label>
              <input name="oldpw" placeholder="请输入现在正在使用的密码" type="password" id="oldpw" size="40" maxlength="16" /></td>
            </tr>
          <tr>
            <td><font class='cufon'>新密码</font></td>
            <td><label for="newpw"></label>
              <input name="newpw" type="password" placeholder="请输入想使用的新密码" id="newpw" size="40" /></td>
            </tr>
          <tr>
            <td><font class='cufon'>重复密码</font></td>
            <td><input name="newpw2" type="password" placeholder="请再输入一次新密码" id="newpw2" size="40" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" id="submit" value="  提交  " /></td>
            </tr>
        </table></form></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>
