$(document).ready(function() {
    $(".various").fancybox({
        maxWidth: 600,
        maxHeight: 330,
        fitToView: false,
        width: '100%',
        height: '100%',
        autoSize: false,
        closeClick: false,
		closeBtn: true,
        openEffect: 'none',
        closeEffect: 'none',
        helpers : {
           overlay : {
	            speedIn  : 0,
	            speedOut : 300,
	            opacity  : 0.8,
	            css      : {
		             cursor : 'default'
	             },
	        closeClick: false
           },
        }
    });
    $(".upload").fancybox({
        fitToView: false,
        width: 350,
        height: 400,
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
		beforeShow:	function() {
			$('#skinViewerFloat').css('visibility','hidden');
		},
		afterClose:	function() {
            $('#skinViewerFloat').css('visibility','visible');
		},
        helpers : {
           overlay : {
	            speedIn  : 0,
	            speedOut : 0,
	            opacity  : 0.8,
	            css      : {
		             cursor : 'default'
	             },
	        closeClick: false
           },
        }
    });
   $('#logo').mouseover(function() {
			$(this).animate({
				left: -3,
				top: -2,
			},20).addClass(".LogoShadows");	
    }).mouseout(function() {
			$(this).animate({
				left: 0,
				top: 0,
			},20);	
    });

   $('#btnUpload').mouseover(function() {
        $('#btnUpload').stop(true, false);
        $('#btnUpload').fadeTo(150, 0.6);
    }).mouseout(function() {
        $('#btnUpload').stop(true, false);
        $('#btnUpload').fadeTo(150, 1);
    });
	
	$('#btnDelete').mouseover(function() {
        $('#btnDelete').stop(true, false);
        $('#btnDelete').fadeTo(150, 0.6);
    }).mouseout(function() {
        $('#btnDelete').stop(true, false);
        $('#btnDelete').fadeTo(150, 1);
    });
	
	$('#btnApply').mouseover(function() {
        $('#btnApply').stop(true, false);
        $('#btnApply').fadeTo(150, 0.6);
    }).mouseout(function() {
        $('#btnApply').stop(true, false);
        $('#btnApply').fadeTo(150, 1);
    });

   $('#Login').mouseover(function() {
        $('#Login').stop(true, false);
        $('#Login').fadeTo(150, 0.6);
    }).mouseout(function() {
        $('#Login').stop(true, false);
        $('#Login').fadeTo(150, 1);
    });
	
   $('#button th').mouseenter(function() {
		$(this).stop();
		$(this).animate({
		  "background-color" : "#001D73"
			});
    }).mouseleave(function() {
		$(this).stop();
		$(this).animate({
			"background-color" : "#0D49FF",
			"color" : "#FFF"
		});
    });
    $(".skinbox").click(function(){
	     if ($(this).hasClass("selected"))
		{
    			$(this).removeClass("selected");
			$(this).find(".check").css("visibility", "hidden");
		}
	     else
		{
	                $(this).addClass("selected");
			$(this).find(".check").css("visibility", "visible");
		}
	});
});

function quit(){
  if(confirm("确定要退出？"))window.location.href="index.php?quit"; 
};

function jumpto(url){
	window.location.href=url; 
};
function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg)) return unescape(arr[2]);
else return null;
}

function transform(lang){
	setCookie('language',lang,7);
	window.location.href=window.location.href; 
};

function setCookie(name,value,days)
{
    if (days)
    {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

/* 在IE7中隐藏js错误 */
function ResumeError() { return true; } window.onerror = ResumeError;

var browser=window.navigator.appName
var b_version=window.navigator.appVersion
var version=b_version.split(";");
var trim_Version=version[1].replace(/[ ]/g,"");

if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0")
{ alert("当前使用的浏览器不兼容McMySkin网站，请下载并使用Chrome浏览器！"); window.location.href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html";}
else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0")
{alert("当前使用的浏览器不兼容McMySkin网站，请下载并使用Chrome浏览器！"); window.location.href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html";}
else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0")
{   if(getCookie("confirm") != "no"){
	    if(confirm("当前使用的浏览器不能很好地兼容McMySkin网站，请下载并使用Chrome浏览器！点击确定跳转到Chrome下载界面，点击取消在本次访问中不会再次提示。")){window.location.href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html";} 
	    else{document.cookie = "confirm" + "=" + "no" +";";}
    }
};

if( navigator.userAgent.indexOf("360")>0){alert("用360的渣渣给我去下Chrome ♂←＿← \n\n                             ——PureDark");
window.location.href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html";}

var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
           document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F4511d0ac5b0651f3385ccac0707c710a' type='text/javascript'%3E%3C/script%3E"));