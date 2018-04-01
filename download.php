<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>McMySkin 皮肤中心 - 下载</title>
<style type="text/css">
#cube3 table tr td p {
	font-weight: normal;
}
.Dlinfo {
	text-align: left;
	padding-left: 10px;
}
.noline {
	line-height: 130%;
}
</style>
<?php
 include ('header.php');
?>
</head>
<?php
  $indextitle = '<strong class="zPageTitle cufon">下载</strong>';
  include("bases.php");
?>
<body>
        <br />
        <br />
<table border="0" align="center" class="mainbody noline">
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
      <font class="cufon">
      <p><a href="./dl/McMySkin(HD)_131.ZIP">Minecraft 1.3.1 自安装版本下载 (仅支持JRE7+)</a></p>
      <table width="600" border="0" align="center">
        <tr>
          <td width="568" height="61" bgcolor="#0040FF" class="dlTitle">McMySkin 下载</td>
        </tr>
        <tr>
          <td bgcolor="#3366FF">
          <table width="539" height="287" border="0" align="center" cellspacing="0">
            <tr>
              <th width="106" bgcolor="#134FFF">名称</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo">McMySkin Mod 全版本通用安装程序</td>
            </tr>
            <tr>
              <th bgcolor="#134FFF">版本</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo">Beta7 (Only 1.2.5-) / RC1 (Only 1.3.1+)</td>
            </tr>
            <tr>
              <th bgcolor="#134FFF">大小</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo">171 KB / 202KB</td>
            </tr>
            <tr>
              <th bgcolor="#134FFF">更新日期</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo">2012-07-15 / 2012-08-08</td>
            </tr>
            <tr>
              <th bgcolor="#134FFF">MD5值</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo">RC1: be74b2c885c41115303011bc8a4916d0</td>
            </tr>
            <tr>
              <th bgcolor="#134FFF">病毒检验</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo"><a href="http://r.virscan.org/report/9087ec29543672c8c677445fc7e133ad.html">Beta7的Virscan监测结果 </a>&nbsp;<a href="http://r.virscan.org/report/e54cda2f0383bba8aa293b7f08c5c784.html">RC1的Virscan监测结果 </a></td>
            </tr>
            <tr>
              <th bgcolor="#134FFF">依赖</th>
              <td colspan="3" bgcolor="#285EFD" class="Dlinfo">Microsoft .NET Framework 2.0（<a href="http://www.microsoft.com/zh-cn/download/details.aspx?id=19">x86</a>/<a href="http://www.microsoft.com/zh-cn/download/details.aspx?id=6523">x64</a>）</td>
            </tr>
            <tr>
              <th colspan="4" bgcolor="#003CEE">下载地址</th>
              </tr>
            <tr class="dlURL">
              <th colspan="3" bgcolor="#245BFF"><div align="center">For RC1</div></th>
              <td bgcolor="#245BFF"><div align="center">[<a href="dl/McMySkin_RC1.zip">本地下载</a>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="http://www.mediafire.com/?fjmbuv6mvudgywt">MediaFire</a>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="http://yunpan.cn/lk/84oa3f2pvq">360云盘</a>]</div></td>
            </tr>
            <tr class="dlURL">
              <th colspan="3" bgcolor="#245BFF"><div align="center">For Beta7</div></th>
              <td width="426" bgcolor="#245BFF"><div align="center">[<a href="dl/McMySkin_Beta7.zip">本地下载</a>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="http://www.mediafire.com/?46ujolro20xidd8">MediaFire</a>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="http://yunpan.cn/lk/84dqbanzvq">360云盘</a>]</div></td>
              </tr>
          </table>
          <p>提示：类似360的安全软件会封杀任何压缩过体积的EXE应用程序，所以请在安装的时候关闭360或者将安装程序添加至信任列表之中。          </p></td>
        </tr>
    </table>
    </font>
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