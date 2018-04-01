<?php session_start(); 
 if(!isset($_SESSION["uid"])){
	 //if($_SESSION["uid"]!=1){
        header("Location: index.php");  //重定向浏览器 
        exit;  //确保重定向后，后续代码不会被
	 //}
		}; 
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<title>McMySkin 皮肤中心 - 签名</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.colorAnimations.js"></script>

<script type='text/javascript' src="http://fancyapps.com/fancybox/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="mms.css" />

 <script type="text/javascript" src="farbtastic.js"></script>
 <link rel="stylesheet" href="farbtastic.css" type="text/css" />
 
<style type="text/css">
.inputclass {
	background-color: #7DABFF;
	border: 1px double #FFF;
}
.button {
	border: 1px solid #77A7FF;
	background-color: #B1CCFF;
	font-size: 14px;
}
.button:hover {
	background-color: #BDD5FF;
}
.button:active {
	background-color: #3783FF;
}
.signbg {
	margin: auto;
	text-align: center;
    position:relative;
    overflow:visible;
}
.signbg #basebg{
position:absolute;
bottom:0px;
right:0px;
z-index:10;
}
.signbg .avatar{
position:absolute;
top:16px;
left:16px;
z-index:10;
}
.signbg .preview{
position:absolute;
top:8px;
right:13px;
z-index:10;
}
.signbg .username{
position:absolute;
font-size:6px;
color:#81b6cc;
top:55px;
left:13px;
z-index:10;
}
.signbg .level{
position:absolute;
font-size:6px;
color:#81b6cc;
top:73px;
left:13px;
z-index:10;
}
</style>

<script type="text/javascript" src="mcmyskin.js"></script>

 <script type="text/javascript" charset="utf-8">
   function cooldown(){
     var cooldown = document.getElementById("submit");
	 var cd = getCookie("cooldown");
     if(cd == 0 || cd == null){
          $("#submit").attr("disabled",false);
          cooldown.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;生成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
      if(getCookie("language") == 'cht'){
	    Cufon.replace('#submit', { fontFamily : "FZZhunYuan-M02T", separate : "characters", hover : true });
      }else{
	    Cufon.replace('#submit', { fontFamily : "ShiShangZhongHeiJianTi", separate : "characters", hover : true });
      }
          return false;
     }
	 cd =  cd - 1;
	 document.cookie = "cooldown" + "=" +  cd  +";";
     cooldown.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+cd+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
      if(getCookie("language") == 'cht'){
	    Cufon.replace('#submit', { fontFamily : "FZZhunYuan-M02T", separate : "characters", hover : true });
      }else{
	    Cufon.replace('#submit', { fontFamily : "ShiShangZhongHeiJianTi", separate : "characters", hover : true });
      }
	 setTimeout("cooldown()",1000);
   }
   function callback(url){
	  $("#newbg").attr("src",url);
	  $("#custombgurl").attr("value",url);
	  $("#custombgurladd").attr("value","http://www.mcmyskin.com/"+url);
   }
   function cusbg(){
	  var url = $("#custombgurladd").val();
	  if(url==""){
	     $("#newbg").attr("src","Minecraft/Signatures/backgrounds/bg.png");
	     $("#custombgurl").attr("value","");
	  }else{
	     $("#newbg").attr("src",url);
	     $("#custombgurl").attr("value",url);
	  }
   }
   function cusavatar(){
	  var url = $("#cusavatar").val();
	  if(url==""){url2 = "<?php echo "http://".$_SERVER["HTTP_HOST"]."/Minecraft/index.php?name=".$_SESSION["username"]; ?>";
	  $(".avatar").attr("src",url2);
	  $("#avatarurl").attr("value","");
	  }else{
	  $(".avatar").attr("src",url);
	  $("#avatarurl").attr("value",url);
	  }
   }
   function fontcolor(){
	 $(".username").css("color", $("#color1").attr("value"));
	 $(".level").css("color", $("#color1").attr("value"));
	 setTimeout("fontcolor()",100);
   }
   function mask(){
    if($("#masked").is(":checked"))
    {
	 $("#basebg").css("visibility", "visible");
    }
    else
    {
	 $("#basebg").css("visibility", "hidden");
    }
   }
   function preview(){
    if($("#preview").is(":checked"))
    {
	 $(".avatar").css("visibility", "visible");
	 $(".preview").css("visibility", "visible");
	 $(".username").css("visibility", "visible");
	 $(".level").css("visibility", "visible");
    }
    else
    {
	 $(".avatar").css("visibility", "hidden");
	 $(".preview").css("visibility", "hidden");
	 $(".username").css("visibility", "hidden");
	 $(".level").css("visibility", "hidden");
    }
   }
 
  $(document).ready(function() {
    var f = $.farbtastic('#picker');
    var p = $('#picker').css('opacity', 1);
    var selected;
    $('.colorwell')
      .each(function () { f.linkTo(this); $(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
          $(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        $(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
    $(".signbg").click(function(){
	     if ($(this).hasClass("chosen"))
		{}
	     else
		{       $(".signbg").removeClass("chosen");
	            $(this).addClass("chosen");
				document.getElementById("bg").value=$(this).attr("bg");
		}
	});
    $("#signature").click(function(){
		var src= $(this).attr("src");
	    window.clipboardData.setData("text",src);
        alert('图片地址已复制到剪贴板');
	});
  $("#submit").click(function(){
	  var bg = $("#bg").attr("value");
	  var idcolor = $("#color1").attr("value");
	  var messcolor = $("#color2").attr("value");
	  var fontsize = $("#fontsize").val();
	  var message = $("#message").val();
	  var custombgurl = $("#custombgurl").val();
	  var avatar = $("#avatarurl").attr("value");
	  var font = "<?php if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){echo "FangZhengZhunYuanFanTi.ttf";}else{echo "FangZhengZhunYuanJianTi.ttf";}?>";
	  if($("#masked").is(":checked"))
	  var mask = "yes";
	  else
	  var mask = "no";
	  if(getCookie("cooldown") == 0 || getCookie("cooldown") == null)
	  {
	  $.post("signatures.php",{avatar : avatar, bg: bg, idcolor: idcolor, messcolor: messcolor, font : font, fontsize: fontsize, message: message, custombgurl : custombgurl, mask : mask},
	  function(result){
	  $("#signature").attr("src",result);
	  $("#imgurl").attr("value",result);
	  });
	  document.cookie = "cooldown" + "=" + 15 +";";
	  $("#submit").attr("disabled",true);
	  document.getElementById("submit").innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
      if(getCookie("language") == 'cht'){
	    Cufon.replace('#submit', { fontFamily : "FZZhunYuan-M02T", separate : "characters", hover : true });
      }else{
	    Cufon.replace('#submit', { fontFamily : "ShiShangZhongHeiJianTi", separate : "characters", hover : true });
      }
	  setTimeout("cooldown()",1000);
	  }
  });
  });
        //返回val的字节长度
        function getByteLen(val) {
            var len = 0;
            for (var i = 0; i < val.length; i++) {
                if (val[i].match(/[^\x00-\xff]/ig) != null) //全角
                    len += 2;
                else
                    len += 1;
            }
            return len;
        }

        //返回val在规定字节长度max内的值
        function getByteVal(val, max) {
            var returnValue = '';
            var byteValLen = 0;
            for (var i = 0; i < val.length; i++) {
                if (val[i].match(/[^\x00-\xff]/ig) != null)
                    byteValLen += 2;
                else
                    byteValLen += 1;

                if (byteValLen > max)
                    break;

                returnValue += val[i];
            }
            return returnValue;
        }

        $(function() {
            var _area = $('textarea#message');
            var _info = $('#showmsg');
            var _max = _area.attr('maxlength');
            var _val;
            _area.bind('keyup change', function() { //绑定keyup和change事件
                if (_info.find('span').size() < 1) {//避免每次弹起都会插入一条提示信息
                    _info.append(_max);
                }

                _val = $(this).val();
                _cur = getByteLen(_val);

                if (_cur == 0) {//当默认值长度为0时,可输入数为默认maxlength值
                    _info.text(_cur+"/"+_max);
                } else if (_cur < _max) {//当默认值小于限制数时,可输入数为max-cur
                    _info.text(_cur+"/"+_max);
                } else {//当默认值大于等于限制数时
                    _info.text(_max+"/"+_max);
                    $(this).val(getByteVal(_val,_max)); //截取指定字节长度内的值
                }
              if(getCookie("language") == 'cht'){
	               Cufon.replace('#showmsg', { fontFamily : "FZZhunYuan-M02T", separate : "characters", hover : true });
              }else{
	               Cufon.replace('#showmsg', { fontFamily : "ShiShangZhongHeiJianTi", separate : "characters", hover : true });
              }
            });
        });
 </script>


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
date_default_timezone_set('PRC');
  $indextitle = '<strong class="zPageTitle cufon">签名</strong>';
  include("bases.php");
  include('mysql.php');
  $con = newlink("widesens_mms");
  mysql_query("SET NAMES utf8");
  $res = mysql_query("SELECT * FROM signatures WHERE username='".$_SESSION["username"]."'");
  $num = mysql_num_rows($res);
  if($num>0){
  $res = mysql_fetch_array($res,MYSQL_ASSOC);
  $signature = "http://".$sitehost."/Minecraft/Signatures/".strtolower($_SESSION["username"]).".png?r=".date("YmdHis");
  $message = $res["message"];
  $idcolor = $res["idcolor"];
  $messcolor = $res["messcolor"];
  $custombgurl = "";
  $avatarurl = "";
  $custombg = "Minecraft/Signatures/backgrounds/bg.png";
  if($res["custombg"]!="")
    {$custombg = $res["custombg"];
	 $custombgurl = $res["custombg"];}
  if($res["avatar"]!="")
    {$avatar = $res["avatar"];
	 $avatarurl = $res["avatar"];}
  }else {$signature = "";
         $message = "";
         $idcolor = "#81b6cc";
         $messcolor = "#81b6cc";
         $custombgurl = "";
         $custombg = "Minecraft/Signatures/backgrounds/bg.png";
         $avatarurl = "";}
   
?>
<body onload="cooldown();fontcolor();">
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
      <table width="100%" border="0" align="center" style="text-align:center; margin-top:40px">
        <tr>
            <th colspan="2">
            <img src="<?php echo "http://".$sitehost."/Minecraft/Signatures/".strtolower($_SESSION["username"]).".png?r=".date("YmdHis"); ?>" alt="" width="648" height="200" id="signature" />
            </th>
        </tr>
        <tr style="vertical-align:top;">
            <th colspan="2" height="50px">
            <p><font class="cufon">图片地址:</font><input name="imgurl" type="text" id="imgurl" class="inputclass" value="<?php echo $signature; ?>"  style=" width:400px" readonly="readonly" /></p>
            <p><hr align="center" size="2" noshade="noshade" color="#FFFFFF" /></p>
            </th>
        </tr>
        <tr>
            <th colspan="2" class="cufon" style="text-align:left;padding-left:10px;">背景选择：</th>
        </tr>
        <tr>
            <th width="50%">
            <div class="signbg chosen" bg="bg1">
               <img src="Minecraft/Signatures/backgrounds/bg1.png" alt="" width="324" height="100" id="bg1" style="background-color: #666666" />
               <img src="<?php echo $avatar; ?>" width="32" height="32" class="avatar" />
               <img src="<?php echo $preview; ?>" width="40" height="85" class="preview" />
               <span class="username"><?php echo $_SESSION["username"]; ?></span>
               <span class="level">Level<?php echo $_SESSION["groupid"]; ?></span>
            </div>
            </th>
            <th width="50%">
            <div class="signbg" bg="bg2">
               <img src="Minecraft/Signatures/backgrounds/bg2.png" alt="" width="324" height="100" id="bg2" style="background-color: #666666" />
               <img src="<?php echo $avatar; ?>" width="32" height="32" class="avatar" />
               <img src="<?php echo $preview; ?>" width="40" height="85" class="preview" />
               <span class="username"><?php echo $_SESSION["username"]; ?></span>
               <span class="level">Level<?php echo $_SESSION["groupid"]; ?></span>
            </div>
            </th>
            <input type="hidden" name="bg" id="bg" value="bg1" />
            <input type="hidden" name="custombgurl" id="custombgurl" value="<?php echo $custombgurl; ?>" />
            <input type="hidden" name="avatarurl" id="avatarurl" value="<?php echo $avatarurl; ?>" />
        </tr>
        <tr>
            <th width="50%" style="padding-top:30px">
             <table width="100%" align="center" style="text-align:center">
               <tr>
                <td>
                  <table width="100%">
                  <tr>
                   <td class="cufon" style="text-align:left;padding-left:10px;">
                   上传自定义背景
                   </td>
                   <td>
                   <input type='checkbox' id='preview' onchange="preview()" checked=CHECKED ><font class="cufon">预览</font>
                   </td>
                  </tr>
                  </table>
                </td>
                <td>
                   <input name='masked' type='checkbox' id='masked' onchange="mask()" checked=CHECKED ><font class="cufon">使用蒙板</font>
                </td>
               </tr>
               <tr>
                <form action="proxyII.php" id="ownbg" name="ownbg" encType="multipart/form-data" method="post" target="hidden_frame">
                <td>
                <input type="file" name="file" id="file" class="inputclass" accept="image/x-ms-bmp,image/x-png,image/jpeg,image/gif"  />
                <iframe name='hidden_frame' id="hidden_frame" style="display:none;"></iframe>
                </td>
                <td>
                    <button type="submit" class="button cufon" />   上传   </button>
                </td>
                </form>
               </tr>
               <tr>
                <td class="cufon">
                URL <input name="custombgurladd" type="text" id="custombgurladd" class="inputclass" value="<?php echo $custombg; ?>"  style=" width:200px" />
                </td>
                <td>
                    <button type="button" onclick='cusbg()' class="button cufon" >   添加   </button>
                </td>
               </tr>
               <tr>
                <td colspan="2">
                  <p class="cufon" style="font-size:12px">提示：上传的图片尺寸将被缩放到648*200</p>
                </td>
               </tr>
             </table>
            </th>
            <th width="50%" style="padding-top:30px">
            <div class="signbg" bg="bg">
               <img src="<?php echo $custombg; ?>" alt="" width="324" height="100" id="newbg" />
               <img src="Minecraft/Signatures/backgrounds/mask.png" alt="" width="324" height="100" id="basebg" />
               <img src="<?php echo $avatar; ?>" width="32" height="32" class="avatar" />
               <img src="<?php echo $preview; ?>" width="40" height="85" class="preview" />
               <span class="username"><?php echo $_SESSION["username"]; ?></span>
               <span class="level">Level<?php echo $_SESSION["groupid"]; ?></span>
            </div>
            </th>
        </tr>
        <tr>
          <td>
             <table width="100%" align="center" class="cufon" style="text-align:center">
               <tr>
                <td width="30%">
                  <label for="color1">ID颜色:</label>
                </td>
                <td>
                  <input type="text" id="color1" name="color1" class="colorwell" onchange="fontcolor()" value="<?php echo $idcolor; ?>" />
                </td>
                <td width="40%">
                字体大小：
                </td>
               </tr>
               <tr>
                <td>
                  <label for="color2">签名颜色:</label>
                </td>
                <td>
                  <input type="text" id="color2" name="color2" class="colorwell" value="<?php echo $messcolor; ?>" />
                </td>
                <td>
                <select name="fontsize" id="fontsize">
                  <option value="24">24</option> 
                  <option value="23">23</option> 
                  <option value="22">22</option> 
                  <option value="21">21</option> 
                  <option value="20">20</option> 
                  <option value="19">19</option> 
                  <option value="18">18</option> 
                  <option value="17">17</option> 
                  <option value="16">16</option> 
                  <option value="15">15</option>
                  <option value="14" selected="true">14</option>
                  <option value="13">13</option>
                  <option value="12">12</option> 
                  <option value="11">11</option> 
                  <option value="10">10</option> 
                  <option value="9">9</option> 
                  <option value="8">8</option> 
                  <option value="7">7</option> 
                  <option value="6">6</option> 
                </select>  
                </td>
               </tr>
             </table>
          </td>
          <td class="cufon">
            个性签名
          </td>
        </tr>
        <tr>
          <td>
            <table align="center">
            <tr>
              <td rowspan="5">
              <div id="picker"></div>
              </td>
              <td>
              <font class="cufon">自定义头像</font>
              </td>
            </tr>
            <tr>
              <td class="cufon">
                仅支持URL
              </td>
            </tr>
            <tr>
              <td class="cufon">
                <input name="cusavatar" type="text" id="cusavatar" class="inputclass" value="<?php echo $avatarurl; ?>"  style=" width:120px" />
              </td>
            </tr>
            <tr>
            <td>
            <p class="cufon" style="font-size:12px">提示：试试空URL添加</p>
            </td>
            </tr>
            <tr>
              <td>
                    <button type="button" onclick='cusavatar()' class="button cufon" >    添加    </button>
              </td>
            </tr>
            </table>
          </td>
          <td style="vertical-align:top;">
            <table align="center">
            <tr>
            <td>
            <p class="cufon" style="font-size:12px">提示：使用繁体的玩家请输入简体……</p>
            </td>
            </tr>
            <tr>
            <td>
            <div class="textarea">
            <textarea id="message" runat="server" maxlength="400"  style="overflow:hidden;width: 300px; height: 100px;" class="inputclass"><?php echo $message; ?></textarea>
            <span id="showmsg" style="color: red"></span>
            </div>
            </td>
            </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="61" colspan="2" class="cufon">
          <button type="button" name="submit" onclick='process()' id="submit" class="button" >      生成      </button>
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
          <td width="70" scope="col"><img src="<?php echo "http://".$sitehost."/Minecraft/index.php?name=".$_SESSION["username"];; ?>" width="64" height="64" class="amenu" id="avatar" /></td>
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
