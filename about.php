<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.AboutTitle {
	color: #FFF;
	font-weight: bold;
	font-size: 36px;
}
.AboutText {
	color: #FFF;
	font-size: 20px;
}
</style>
<head>
<title>McMySkin 皮肤中心 - 关于</title>
<?php
 include ('header.php');
?>
</head>
<?php 
    $indextitle = '<strong class="zPageTitle cufon">关于</strong>';
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
      <table width="757" height="337" border="0" align="center">
        <tr>
           <td height="53" class="AboutTitle cufon">关于McMySkin</td>
        </tr>
        <tr>
           <td height="8"><hr align="center" size="3" noshade="noshade" color="#FFFFFF" /></td>
        </tr>
        <tr>
           <td>
           <p><span class="AboutText cufon">McMySkin是著名独立游戏《Minecraft》的一个模组，其作用是在游戏中显示自己上传的皮肤。TA支持所有能显示皮肤的《Minecraft》版本，而且还能帮您上传披风并且在游戏中显示出来。也许您没有正版的《Minecraft》，但是没关系，McMySkin帮助您享受比正版用户更强大的《Minecraft》皮肤上传、管理功能。</span></p>
           <hr align="center" size="1" noshade="noshade" color="#FFFFFF" />
           <table border="0" style="text-align:left; margin-left:50px;">
              <tr>
                <th rowspan="5" style="vertical-align:top;"><p class="AboutText cufon">大事记：</p></th>
                <td>
                   <p class="AboutText cufon">2011年7月 - McMySkin正式对外开放</p>
                </td>
              </tr>
              <tr>
                <td>
                   <p class="AboutText cufon">2011年11月 - McMySkin用户突破1000人，皮肤客户端发布</p>
                </td>
              </tr>
              <tr>
                <td>
                   <p class="AboutText cufon">2012年年初 - McMySkin推出全版本通用皮肤安装器</p>
                </td>
              </tr>
              <tr>
                <td>
                   <p class="AboutText cufon">2012年5月 - McMySkin因服务器原因停止运营</p>
                </td>
              </tr>
              <tr>
                <td>
                   <p class="AboutText cufon">2012年7月 - McMySkin_v2正式对外开放</p>
                </td>
              </tr>
           </table>
           <hr align="center" size="1" noshade="noshade" color="#FFFFFF" />
           <p class="AboutText cufon">参与制作人员：ICE、Indeed、Plqws、PureDark、Ruo、Szszss、Toby、Wxdao（首字母顺序）</p>
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
