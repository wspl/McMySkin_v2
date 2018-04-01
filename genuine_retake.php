<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
input {
	background-color: #7DABFF;
	border: 1px double #A6C2FF;
}
.shadows tr td #form1 table tr th {
	color: #FFF;
}
.shadows tr td #form1 table tr td {
	color: #FFF;
	text-align: center;
}
</style>
<head>
<title>McMySkin 皮肤中心 - 正版帐号找回</title>
<?php
 include ('header.php');
?>
</head>
<?php 
    include("bases.php");
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
      <p><img class="various fancybox.iframe" href="./login.php" src="Image/btnLogin.png" alt="登录" name="Login" width="161" height="101" id="Login" /></p>
      </td>
  </tr>
  <tr>
      <td id="cube3" class="MainInfo">
<?php
include('mysql.php');
  $con = newlink("widesens_mms");
  
   function process_form($data){
		  echo "<br /><p class='cufon'>帐号信息修改成功！</p>";
		  $uid = mysql_fetch_row(mysql_query("SELECT uid from mmsusers where username = '".$data["username"]."'"));
		  $groupid = mysql_fetch_row(mysql_query("SELECT groupid from userbase where username = '".$data["username"]."'"));
		  mysql_query("UPDATE mmsusers SET password = '".md5($data["newpw"])."' where username = '".$data["username"]."'");
		  mysql_query("UPDATE userbase SET email = '".md5($data["email"])."' where username = '".$data["username"]."'");
		  mysql_query("UPDATE userbase SET genuine = 1 where username = '".$data["username"]."'");
		  $_SESSION["uid"]=$uid[0];
		  $_SESSION["username"]=$data["username"];
		  $_SESSION["groupid"]=$groupid[0];
		  $_SESSION["genuine"]=1;
		  echo "<script>";
          echo  "setTimeout('jumpto(\"index.php\")',500); ";
          echo "</script>";
   }

if(!isset($_POST["submit"])){
	?>
 <font class="cufon">
<table width="577" border="0" align="center" cellspacing="0">
  <tr>
    <th height="47" bgcolor="#3333FF" class="MMSLogin" scope="col">正版找回</th>
  </tr>
  <tr>
    <td height="261" bgcolor="#3366FF"><table width="480" height="214" border="0" align="center">
      <tr>
        <td width="474" height="93">提示：请输入您的正版帐号和密码，MMS将直接向mojang验证。通过了就可以修改帐号的密码和邮箱。</td>
      </tr>
      <tr>
        <td>
        <form action="" method="post">
        <table width="387" height="98" border="0" align="center">
          <tr>
            <td width="99">用户名</td>
            <td width="278"><label for="username"></label>
              <input name="username" placeholder="请输入您的正版ID" type="text" size="40" maxlength="16" /></td>
          </tr>
          <tr>
            <td>密码</td>
            <td><label for="password"></label>
              <input name="password" type="password" placeholder="请输入您的密码" size="40" maxlength="16"  /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" id="submit" value="      验证      " /></td>
          </tr>
        </table>
        </form>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
 </font>
    <?php
}elseif(trim($_POST["submit"])=="验证"){
	 $num = mysql_fetch_row(mysql_query("select count(username) from userbase where username='".$_POST["username"]."'"));
	 if(!$num[0] > 0){echo "<br /><p class='cufon'>用户名没有被注册！</p>";}
	 else{
     $genuine = file_get_contents_curl("http://www.minecraft.net/haspaid.jsp?user=".trim($_POST["username"]));
	 if($genuine=="true"){
     $pass = file_get_contents_curl("https://login.minecraft.net/?user=".trim($_POST["username"])."&password=".$_POST["password"]."&version=12");
	 if(preg_match("/^Bad/",$pass)){echo("<br /><p class='cufon'>密码错误！</p>");}
	 else{
	 $pass = explode(":",$pass);
	 if($pass[2]==$_POST["username"]){
	?>
 <font class="cufon">
    <form id="form1" method="post" action="">
      <table width="423" height="216" border="0" align="center">
        <tr>
            <th colspan="2" bgcolor="#286FFF"><strong class="cufon">修改帐号信息</strong></th>
        </tr>
        <tr>
          <td width="107" bgcolor="#4280FF"><font class='cufon'>密码</font></td>
          <td width="347" bgcolor="#5189FF"><label for="username"></label>
            <input name="newpw" type="password" id="newpw" size="35"  maxlength="16" /></td>
        </tr>
        <tr>
          <td bgcolor="#4280FF"><font class='cufon'>邮箱</font></td>
          <td bgcolor="#5189FF"><input name="email" type="text" id="email" size="35" /></td>
        </tr>
        <tr>
        <input name="password" type="hidden" id="password" value="<?php echo $_POST["password"] ?>" /><input name="username" type="hidden" id="username" value="<?php echo $_POST["username"] ?>" />
          <td colspan="2" bgcolor="#5189FF"><input type="submit" name="submit" id="submit" value="      修改      " /></td>
          </tr>
      </table>
    </form>
 </font>
    <?php
	 }else{ echo "<br /><p class='cufon'>帐号大小写要与官方保持一致！</p>";}
	 }
     }else{ echo "<br /><p class='cufon'>该帐号不是正版帐号！</p>";}
	 }

}elseif(trim($_POST["submit"])=="修改"){
	 $num = mysql_fetch_row(mysql_query("select count(username) from userbase where username='".$_POST["username"]."'"));
	 if(!$num[0] > 0){echo "<br /><p class='cufon'>用户名没有被注册！</p>";}
	 else{
     $genuine = file_get_contents_curl("http://www.minecraft.net/haspaid.jsp?user=".trim($_POST["username"]));
	 if($genuine=="true"){
     $pass = file_get_contents_curl("https://login.minecraft.net/?user=".trim($_POST["username"])."&password=".$_POST["password"]."&version=12");
	 if(preg_match("/^Bad/",$pass)){echo("<br /><p class='cufon'>密码错误！</p>");}
	 else{
	 $pass = explode(":",$pass);
	 if($pass[2]==$_POST["username"]){
	   $temail = mysql_fetch_row(mysql_query("select email from userbase where username='".$_POST["username"]."'"));
	   if($_POST["email"]==$temail[0]){
		   process_form($_POST);
	   }else{
	   $num = mysql_fetch_row(mysql_query("select count(email) from userbase where email='".$_POST["email"]."'"));
	   if($num[0] > 0){echo "<br /><p class='cufon'>邮箱已被使用！</p>";}
	   else{
                      if (!strlen($_POST["email"]) > 6 || !preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/i", $_POST["email"])) {
                         echo "<br /><p class='cufon'>邮箱格式不正确！</p>";
                       } else {
                         process_form($_POST);
                       }
	   }
	   }
		 
	 }else{ echo "<br /><p class='cufon'>帐号大小写要与官方保持一致！</p>";}
	 }
     }else{ echo "<br /><p class='cufon'>该帐号不是正版帐号！！</p>";}
	 }
};
?>
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
      <td height="74" colspan="2" class="mmsFooter">
        <font class='cufon'><?php echo $footer; ?></font>
      </td>
  </tr>
</table><p></p>
</body>
</html>
