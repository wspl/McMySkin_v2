<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<title>McMySkin 皮肤中心 - 捐助</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.colorAnimations.js"></script>
<script type='text/javascript' src="http://fancyapps.com/fancybox/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="mms.css" />
<style type="text/css">
.donateMain {
	font-size: 36px;
	color: #fff;
}
.donateText {
	font-size: 16px;
}
.mainbody tr #cube3 div .donateText {
	color: #FFF;
}
</style>
<script type="text/javascript" src="mcmyskin.js" charset="UTF-8"></script>

<script src="http://mcmyskin.googlecode.com/files/cufon-yui.js" type="text/javascript"></script> 
<?php
 if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){
	echo '<script src="http://mcmyskin.googlecode.com/files/font.FZZhunYuan.js?r=1" type="text/javascript"></script> ';
 }else{
	echo '<script src="http://mcmyskin.googlecode.com/files/font.ShiShangZhongHeiJianTi3.js?r=1" type="text/javascript"></script> ';
 }
?>
<script type="text/javascript" src="cufon.js"></script>

</head>
<?php
  $indextitle = '<strong class="zPageTitle cufon">捐助</strong>';
  include("bases.php");
?>
<body>
        <br />
        <br />
<table border="0" align="center" class="mainbody">
  <tr>
      <td id="cube1" class="mmsTitle" scope="col">
      <a href="index.php"><img src="Image/logo.png" name="logo" id="logo" /></a>
      </td>
      <td id="cube2" scope="col">
      <p id="indextitle"><strong class="zPageTitle cufon"><?php echo $indextitle; ?></strong></p>
      </td>
  </tr>
  <tr>
      <td id="cube3">
      <div>
        <p class="donateMain cufon">捐助我们</p>
        <hr align="center" size="2" noshade="noshade" color="#FFFFFF" />
        <p class="donateText cufon">我们McMySkin一直在致力于提供玩家Minecraft皮肤显示功能，</p>
        <p class="donateText cufon">McMySkin自从开站以来一直在坚持不懈的努力为大家提供更好的服务，</p>
        <p class="donateText cufon">我们将坚持永久免费提供服务，并将不会在网页上放置任何广告</p>
        <hr align="center" size="1" noshade="noshade" color="#FFFFFF" />
        <table height="193" cellspacing="5">
          <tr>
            <td height="187" style="text-align:left"><blockquote>
              <p class="donateText cufon">您的捐款将用于：</p>
              <p class="donateText cufon">1. 持续并且深入地开发与更新 </p>
              <p class="donateText cufon">2. 持续网站服务器的稳定运行</p>
              <p class="donateText cufon">3. 租用更好的网站数据服务器</p>
              <p class="donateText cufon">4. 升级网站数据存放的服务器</p>
            </blockquote>            </td>
            <td style="text-align:left"><blockquote>
              <p class="donateText cufon">目前VPS配置（需要续费）：</p>
              <p class="donateText cufon">CPU: Intel Xeon E3-1230 V2  </p>
              <p class="donateText cufon">内存: 512M/1024M</p>
              <p class="donateText cufon">硬盘: 25G</p>
              <p class="donateText cufon">流量: 1000G </p>
            </blockquote>              </td>
          </tr>
        </table>
        <hr align="center" size="1" noshade="noshade" color="#FFFFFF" />
        <p class="donateText cufon">捐款方式：</p>
         <table width="254" class="donateText" style="text-align:left; margin:auto;">
           <tr>
           <td colspan="2">
              <span class="cufon">1.使用支付宝：</span>
           </td>
           </tr>
           <tr>
           <td colspan="2">
              <span class="cufon">请留下名字（ID或者昵称都行）</span>
           </td>
           </tr>
           <tr>
           <td colspan="2">
            <a target="_blank" href='http://me.alipay.com/mcmyskin'> <img src='http://thinkphp.cn/Public/Home/Images/btn-index.png' style="border:0px;" /></a>
           </td>
           </tr>
           <tr>
           <td colspan="2">
              <span class="cufon">2.使用PayPal：</span>
           </td>
           </tr>
           <tr>
           <td colspan="2">
              <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="bruce.lee.liang@gmail.com">
              <input type="hidden" name="item_name" value="捐助我们">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="amount" value="">
              <input type="hidden" name="charset" value="utf-8" />
              <input type="image" src="http://www.paypal.com/zh_XC/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
              </form>
           </td>
           </tr>
           <tr>
           <td colspan="2">
              <span class="cufon">2.银行汇款（中国农业银行）：</span>
           </td>
           </tr>
           <tr>
           <td>
              <span class="cufon">帐号：</span>
           </td>
           <td>
              622848 0850807579014
           </td>
           </tr>
           <tr>
           <td>
              <span class="cufon">收款人：</span>
           </td>
           <td>
              梁雨聪
           </td>
           </tr>
           <tr>
           <td>
              <span class="cufon">开户行：</span>
           </td>
           <td>
              广西分行
           </td>
           </tr>
        </table>
      </div>
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
    <td height="74" colspan="2" class="mmsFooter"><table width="977" height="85" border="0" cellspacing="0">
      <tr>
        <td height="26" colspan="8" bgcolor="#0B42D5"><span class="friend">友情链接</span></td>
        </tr>
      <tr class="friend">
   <?php
       foreach($friends as $friend){
         echo $friend;
	   }
   ?>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
      <td height="74" colspan="2" class="mmsFooter">
        <font class='cufon'><?php echo $footer; ?></font>
        <script type="text/javascript" src="http://js.tongji.linezing.com/2921572/tongji.js"></script><noscript><a href="http://www.linezing.com"><img src="http://img.tongji.linezing.com/2921572/tongji.gif"/></a>
      </td>
  </tr>
</table><p></p>
</noscript>
</body>
</html>
