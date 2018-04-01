<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.ListTitle {
	color: #FFF;
	font-weight: bold;
	font-size: 26px;
}
.ListText {
	color: #FFF;
	font-size: 16px;
	padding-left:30px;
}
</style>
<head>
<title>McMySkin 皮肤中心 - 名单</title>
<?php
 include ('header.php');
?>
</head>
<?php 
    $indextitle = '<strong class="zPageTitle cufon">名单</strong>';
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
      <p id="indextitle"><?php echo $indextitle; ?></p>
      </td>
  </tr>
  <tr>
    <td id="cube3" class="MainInfo">
      <table width="757" align="center" style="border:0px;">
        <tr>
           <td width="50%" height="45" class="ListTitle cufon">正版名单</td>
           <td height="45" class="ListTitle cufon">捐款名单</td>
        </tr>
        <tr>
           <td height="8"><hr align="center" size="3" noshade="noshade" color="#FFFFFF" /></td>
           <td height="8"><hr align="center" size="3" noshade="noshade" color="#FFFFFF" /></td>
        </tr>
        <tr>
           <td>
          <iframe src="lists.php" allowtransparency="true" style="background-color:transparent;" frameborder="0" width="374" height="550" scrolling="no"></iframe>
           </td>
           <td>
          <iframe src="lists.php?donate" allowtransparency="true" style="background-color:transparent;" frameborder="0" width="374" height="550" scrolling="no"></iframe>
           </td>
        </tr>
      </table>
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
