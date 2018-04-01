<?php 
  if($_SESSION["uid"]!=1){
    /*echo "<script>";
	echo "window.location.href='index.html';";
	echo "</script>";*/
  }
    $sitehost = $_SERVER["HTTP_HOST"]."";
	
	$footer = "Powered By <a href=\"http://widesense.tk\">WideSense</a> &amp; <a href=\"http://puredark.info\">PureDark</a>";
	
    if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){
		 $trans = "简体中文";
		 $lang = 'chs';
	}else{
		 $trans = "繁体中文";
		 $lang = 'cht';
	}
	
	$avatar = "http://".$sitehost."/Minecraft/index.php?name=".$_SESSION["username"];
	$preview = "http://".$sitehost."/Minecraft/MinecraftSkins/preview/".strtolower($_SESSION["username"])."_3d.png?r=".date("YmdHis");
    if(isset($_SESSION["uid"]) && $_SESSION["genuine"] == 1){
		if(strlen($_SESSION["username"])>=12){
	     $username = "<table align='center'><tr><td style='font-size: 12px;'>".$_SESSION["username"]."</td></tr><tr><td style='font-size: 9px;'>UID:".$_SESSION["uid"]."</td></tr></table><img src=\"Image/genuine.png\" width='50' />";
		}else{
	     $username = "<table align='center'><tr><td>".$_SESSION["username"]."</td></tr><tr><td style='font-size: 9px;'>UID:".$_SESSION["uid"]."</td></tr></table><img src=\"Image/genuine.png\" width='50' />";
		}
         $userinfo = Array(
              "1" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('skinpanel.php')\">[管理皮肤]</th>",
              "2" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('capepanel.php')\">[管理披风]</th>",
			  "3" => "<th height=\"35\" colspan=\"3\" class=\"various fancybox.iframe\" href=\"./changepw.php\">[修改密码]</th>",
              "4" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('signrender.php')\">[生成签名]</th>",
              "5" => "<th height=\"35\" colspan=\"3\" onclick=\"quit()\">[退出]</th>",
              );
	}elseif(isset($_SESSION["uid"])){
		if(strlen($_SESSION["username"])>=12){
	     $username = "<table align='center'><tr><td style='font-size: 12px;'>".$_SESSION["username"]."</th></tr><tr><td style='font-size: 9px;'>UID:".$_SESSION["uid"]."</td></tr></table>";
		}else{
	     $username = "<table align='center'><tr><td>".$_SESSION["username"]."</th></tr><tr><td style='font-size: 9px;'>UID:".$_SESSION["uid"]."</td></tr></table>";
		}
         $userinfo = Array(
              "1" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('skinpanel.php')\">[管理皮肤]</th>",
              "2" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('capepanel.php')\">[管理披风]</th>",
			  "3" => "<th height=\"35\" colspan=\"3\" class=\"various fancybox.iframe\" href=\"./changepw.php\">[修改密码]</th>",
			  "4" => "<th id=\"genuine\" height=\"35\" colspan=\"3\" class=\"various fancybox.iframe\" href=\"./genuine_certificate.php\">[正版认证]</th>",
              "5" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('signrender.php')\">[生成签名]</th>",
              "6" => "<th height=\"35\" colspan=\"3\" onclick=\"quit()\">[退出]</th>",
              );
	}else{
		 $username = "尚未<a class='various fancybox.iframe' href='./login.php'><u><strong>登录</strong></u></a>";
		 $avatar = "http://".$sitehost."/Minecraft/index.php";
         $userinfo = Array(
              "1" => "<th height=\"35\" colspan=\"3\" class=\"various fancybox.iframe\" href=\"./register.php\" >[注册]</th>",
              "2" => "<th height=\"35\" colspan=\"3\" class=\"various fancybox.iframe\" href=\"./genuine_register.php\" >[正版注册]</th>",
			  "3" => "<th height=\"35\" colspan=\"3\" onclick=\"jumpto('genuine_retake.php')\">[正版找回]</th>",
              );
		$indextitle = '<img class="various fancybox.iframe" href="./login.php" src="Image/btnLogin.png" alt="登录" name="Login" width="161" height="101" id="Login" />';
		}; 
	
  $button = Array(
              "1" => "<th height=\"35\" onclick=\"jumpto('index.php')\">主页</th>",
			  "2" => "<th height=\"35\" onclick=\"jumpto('download.php')\">下载</th>",
              "3" => "<th height=\"35\" onclick=\"jumpto('http://widesense.tk')\">研究所</th>",
              "4" => "<th height=\"35\" onclick=\"jumpto('http://puredark.info')\">PureDark</th>",
              "5" => "<th height=\"35\" onclick=\"jumpto('about.php')\">关于</th>",
              "6" => "<th height=\"35\" onclick=\"jumpto('namelist.php')\">正版/捐款名单</th>",
              "7" => "<th height=\"35\" onclick=\"jumpto('donate.php')\">捐助我们</th>",
              "8" => "<th height=\"35\" onclick=\"transform('".$lang."')\">".$trans."</th>",
              );
  $friends = Array(
              "1" => "<td bgcolor=\"#2E65F5\"><img src=\"Image/empty.png\" alt=\"申请交换链接请发送邮件至：Widesense.plqws@gmail.com\" /></td>",
              "2" => "<td bgcolor=\"#205AF4\"><img src=\"Image/empty.png\" alt=\"申请交换链接请发送邮件至：Widesense.plqws@gmail.com\" /></td>",
              "3" => "<td bgcolor=\"#2E65F5\"><img src=\"Image/empty.png\" alt=\"申请交换链接请发送邮件至：Widesense.plqws@gmail.com\" /></td>",
              "4" => "<td bgcolor=\"#205AF4\"><img src=\"Image/empty.png\" alt=\"申请交换链接请发送邮件至：Widesense.plqws@gmail.com\" /></td>",
              "5" => "<td bgcolor=\"#2E65F5\"><a target=\"_blank\" href=\"http://forum.minecraft-hk.com\"><img src=\"http://forum.minecraft-hk.com/static/image/common/logo_88_31.gif\" alt=\"Minecraft-HK Community\"  longdesc=\"http://forum.minecraft-hk.com\" /></a></td>",
              "6" => "<td bgcolor=\"#205AF4\"><a target=\"_blank\" href=\"http://www.epicwork.org\"><img src=\"http://epicwork.yiy5.com/data/attachment/forum/201207/18/180152ln38njsjqvnnslt0.png\" alt=\"EpicWork\" longdesc=\"http://www.epicwork.org\"/></a></td>",
              "7" => "<td bgcolor=\"#2E65F5\"><a target=\"_blank\" href=\"http://www.mcbbs.net\"><img src=\"http://www.mcbbs.net/custom_common_images/link_icon.gif\" alt=\"Minecraft 中文论坛\"  longdesc=\"http://www.mcbbs.net\" /></a></td>",
              "8" => "<td bgcolor=\"#205AF4\"><span ><img src=\"http://img170.poco.cn/mypoco/myphoto/20120718/18/6462911120120718180222044.gif\" alt=\"McMySkin\" longdesc=\"http://mcmyskin.com\" /></span></td>",
              );
	
    if(isset($_GET["quit"])){
         unset($_SESSION["uid"]);
         unset($_SESSION["username"]);
         unset($_SESSION["groupid"]);
         unset($_SESSION["genuine"]);
		  echo "<script>";
          echo  "jumpto('index.php')";
          echo "</script>";
		};			  
			  ?>