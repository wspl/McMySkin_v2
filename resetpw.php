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
<title>McMySkin 皮肤中心 - 重置密码</title>
<?php
 include ('header.php');
?>
</head>
<?php 
date_default_timezone_set('PRC');
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
if(!isset($_GET['p'])){die("<font class='cufon'>请不要开玩笑谢谢。</font>");};
  $con = newlink("widesens_mms");

/**
 * 用base64_decode解开$_GET['p']的值
*/
 $array = explode('.',base64_decode($_GET['p']));

$sql = mysql_fetch_row(mysql_query("SELECT password from mmsusers where username = '".trim($array['0'])."'"));

$password = $sql[0];

 $checkCode = md5($array['0'].'+'.$password);

if(time()-$array[1]< 10800){
 
if(!isset($_POST["submit"])){


if( $array['2'] === $checkCode ){
	?>
        <form id="form1" method="post" action="">
      <table width="423" height="216" border="0" align="center">
        <tr>
            <th colspan="2" bgcolor="#286FFF"><strong class="cufon">更改密码</strong></th>
        </tr>
        <tr>
          <td width="107" bgcolor="#4280FF"><font class='cufon'>新密码</font></td>
          <td width="347" bgcolor="#5189FF"><label for="newpw"></label>
            <input name="password" type="password" id="password" size="35"  maxlength="16" /></td>
        </tr>
        <tr>
          <td bgcolor="#4280FF"><font class='cufon'>重复密码</font></td>
          <td bgcolor="#5189FF"><input name="repassword" type="password" id="repassword" size="35"  maxlength="16" /></td>
        </tr>
        <tr>
        <input name="checkcode" type="hidden" id="checkcode" value="<?php echo $checkCode; ?>"/>
        <input name="username" type="hidden" id="username" value="<?php echo $array[0]; ?>"/>
          <td colspan="2" bgcolor="#5189FF"><input type="submit" name="submit" id="submit" value="      提交      " /></td>
          </tr>
      </table>
    </form>
    <?php
}else{
       echo "<font class='cufon'>链接不正确！</font>";
}
}else{
if( $_POST["password"] === $_POST["repassword"] ){
	if( $_POST["checkcode"] === $checkCode ){
          $plen = (strlen ( $_POST["password"] ) + mb_strlen ( $_POST["password"], 'utf-8' )) / 2;
             if ($plen < 6 & $plen > 0) {echo "<font class='cufon'>密码长度不能少于6个字符！</font>";}elseif($plen == 0){echo "<font class='cufon'>密码不能为空！</font>";}
		     else{
                if (!preg_match("/^[a-zA-Z0-9][a-zA-Z0-9_]{2,15}$/i",$_POST["username"])) {
                     echo "<br /><p class='cufon'>用户名只能是英文字母、数字和_且必须是字母或数字开头！</p>";
                } else {
	             	mysql_query("UPDATE mmsusers SET password='".md5($_POST["password"])."' where username = '".$_POST["username"]."'");
		            echo "<font class='cufon'>密码修改成功！</font>";
	                echo "<script>";
                    echo  "window.setTimeout('jumpto(\"index.php\");', 1000);";
                    echo "</script>";
                }
		      }
	}
}else{echo "<font class='cufon'>两次输入的密码不相同！</font>";}

};

}else{echo "<font class='cufon'>链接已过期！</font>";}
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
