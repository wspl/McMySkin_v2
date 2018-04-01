<?php
date_default_timezone_set('PRC');
mb_internal_encoding("UTF-8"); // 设置编码
if(!isset($_REQUEST["username"]))die("……");
  $username=strtolower($_REQUEST["username"]);
  $level=$_REQUEST["groupid"];

if(function_exists("imagecreatetruecolor"))
  $sign = imagecreatetruecolor(648, 200); // 创建目标图gd2
else
  $sign = imagecreate(648, 200); // 创建目标图gd1

imagealphablending($sign, true);
imagesavealpha($sign, true);
$white = imagecolorallocatealpha($sign,255,255,255,127);
imagefill($sign,0,0,$white);
$color = imagecolorat($sign, 1, 1);
imagecolortransparent($sign, $color);


if(isset($_REQUEST["bg"]))
     $bg = "Minecraft/Signatures/backgrounds/".$_REQUEST["bg"].".png"; 
else $bg = "Minecraft/Signatures/backgrounds/bg1.png";
if($_REQUEST["bg"] == "bg" && $_REQUEST["custombgurl"]!='')
     $bg = $_REQUEST["custombgurl"];
if(preg_match("/.png/i",$bg)){
	$signt = imagecreatefrompng($bg);
}elseif(preg_match("/.jpg/i",$bg)||preg_match("/.jpeg/i",$bg)){
	$signt = imagecreatefromjpeg($bg);
}elseif(preg_match("/.gif/i",$bg)){
	$signt = imagecreatefromgif($bg);
}elseif(preg_match("/.bmp/i",$bg)){
	$signt = imagecreatefrombmp($bg);
}
imagealphablending($signt, true);
imagesavealpha($signt, true);
$x = imagesx($signt);
$y = imagesy($signt);
imagecopyresampled($sign, $signt, 0, 0, 0, 0, 648, 200, $x, $y);

if($_REQUEST["bg"]=="bg" && $_REQUEST["mask"]=="yes"){
	$mask = imagecreatefrompng("Minecraft/Signatures/backgrounds/mask.png");
	imagecopy( $sign, $mask, 0, 0, 0, 0, 648, 200 ); 
}

if(isset($_REQUEST["fontsize"]))
     $fontsize=$_REQUEST["fontsize"];
else $fontsize=14;

$idcolor   =   "#81b6cc";  
$messcolor   =   "#81b6cc";  
if(isset($_REQUEST["idcolor"])){$idcolor   =   $_REQUEST["idcolor"]; }
if(isset($_REQUEST["messcolor"])){$messcolor   =   $_REQUEST["messcolor"]; }
$r   =   $idcolor[1].$idcolor[2]; 
$r   =   hexdec   ($r); 
$b   =   $idcolor[3].$idcolor[4]; 
$b   =   hexdec   ($b); 
$g   =   $idcolor[5].$idcolor[6]; 
$g   =   hexdec   ($g); 
$idcolor = imagecolorallocatealpha($sign,$r,$b,$g,0);
$r   =   $messcolor[1].$messcolor[2]; 
$r   =   hexdec   ($r); 
$b   =   $messcolor[3].$messcolor[4]; 
$b   =   hexdec   ($b); 
$g   =   $messcolor[5].$messcolor[6]; 
$g   =   hexdec   ($g); 
$messcolor = imagecolorallocatealpha($sign,$r,$b,$g,0);

if($_REQUEST["avatar"]!="")
  $avatarurl=$_REQUEST["avatar"];
else
  $avatarurl="http://".$_SERVER["HTTP_HOST"]."/Minecraft/index.php?name=".$username;

$font = realpath(".")."/".$_REQUEST["font"];
$idsize = autofontsize(12, 0, $font, $_REQUEST["username"], 90); // 自动获得合适字体大小

if(function_exists("imagecreatetruecolor"))
  $avatar = imagecreatetruecolor(64, 64); // 创建目标图gd2
else
  $avatar = imagecreate(64, 64); // 创建目标图gd1

imagealphablending($avatar, true);
imagesavealpha($avatar, true);

  // 获取头像
$avatart = @imagecreatefrompng($avatarurl);
$x = imagesx($avatart);
$y = imagesy($avatart);
imagecopyresampled($avatar, $avatart, 0, 0, 0, 0, 64, 64, $x, $y);
$avatart = @imagecreatefromjpeg($avatarurl);
$x = imagesx($avatart);
$y = imagesy($avatart);
imagecopyresampled($avatar, $avatart, 0, 0, 0, 0, 64, 64, $x, $y);
$avatart = @imagecreatefromgif($avatarurl);
$x = imagesx($avatart);
$y = imagesy($avatart);
imagecopyresampled($avatar, $avatart, 0, 0, 0, 0, 64, 64, $x, $y);
  // 获取3D预览
$threed="Minecraft/MinecraftSkins/preview/".$username."_3d.png";
$skinpreview = imagecreatefrompng($threed);
if(file_exists($threed))$skinpreview = imagecreatefrompng($threed);
else $skinpreview = imagecreatefrompng("http://".$_SERVER["HTTP_HOST"]."/3d.php?a=-20&w=25&ratio=10&name=".$username);
imagealphablending($skinpreview, true);
imagesavealpha($skinpreview, true);


  // 头像
   imagecopy( $sign, $avatar, 32, 32, 0, 0, 64, 64 ); 

  // 3D预览
   imagecopy( $sign, $skinpreview, 542, 15, 0, 0, 80, 170 ); 

  // 用户信息
   imagettftext($sign,$idsize,0,32,132,$idcolor,$font,$_REQUEST["username"]);
   imagettftext($sign,12,0,32,168,$idcolor,$font,"Level ".$level);
if($_REQUEST["genuine"]==1){
  // 正版印章
   $genuine = imagecreatefrompng("Image/genuine.png");
   imagealphablending($genuine, true);
   imagesavealpha($genuine, true);
   imagecopyresampled($sign, $genuine, 80, 106, 0, 0, 40, 24, 100, 59);
}

if($_REQUEST["message"]==""){
	$text = "";
	$x=0;
	$y=0;
}else{
	$text = $_REQUEST["message"];
    //$text = iconv("GB2312", "UTF-8", $text);
	$text = str_replace("\\\\n", "\n", $text);
	$text = str_replace("\\", "", $text);
	$text = str_replace("~", "～", $text);
	$text = autowrap($fontsize, 0, $font, $text, 360); // 自动换行
	$testbox = imagettfbbox($fontsize, 0, $font, $text);
	$x=180-$testbox[2]/2;
	$y=65-$testbox[1]/2;
    imagettftext($sign,$fontsize,0,$x+134,$y+53+8,$messcolor,$font,$text);
}
$dest = "Minecraft/Signatures/".$username.".png";

  imagepng($sign, $dest);

  //echo socket_REQUEST('http://imagecraft.linuxteam.com/api.php', array('apikey'=>'public'), array('image'=>$dest));

  //$regs = explode("http://",$resp_str);
  //$url = "http://".$regs[1];
  //echo $url;
  //unlink($dest);
  
  echo "http://".$_SERVER["HTTP_HOST"]."/".$dest;
  
  
  
  function autowrap($fontsize, $angle, $fontface, $string, $width) {
  // 这几个变量分别  是 字体大   小, 角 度,  字体名称,    字符串,  预设宽度 
  $content = "";
  
	// 将字符串拆分成一个个单字 保存到数组 letter 中
	for ($i=0;$i<mb_strlen($string);$i++) {
		$letter[] = mb_substr($string, $i, 1);
	}

	foreach ($letter as $l) {
		$teststr = $content." ".$l;
		$testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
		// 判断拼接后的字符串是否超过预设的宽度
		if (($testbox[2] > $width) && ($content !== "")) {
			$content .= "\n";
		}
		$content .= $l;
	}
	return $content;
}
  function autofontsize($fontsize, $angle, $fontface, $string, $width) {
  // 这几个变量分别是        字体大小,   角度,    字体名称,   字符串,  预设宽度 
  $content = "";
  $retry = 0;
  
	// 将字符串拆分成一个个单字 保存到数组 letter 中
	for ($i=0;$i<mb_strlen($string);$i++) {
		$letter[] = mb_substr($string, $i, 1);
	}

	foreach ($letter as $l) {
		$teststr = $content." ".$l;
		$testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
		// 判断拼接后的字符串是否超过预设的宽度
		if (($testbox[2] > $width) && ($content !== "")) {
			$fontsize--;
			$retry = 1;
			break;
		}
		$content .= $l;
	}
	if($retry==1){
		return autofontsize($fontsize, $angle, $fontface, $string, $width);
	}
	return $fontsize;
}

    function socket_REQUEST($url, $postdata=array(), $files=array())
    {
        $boundary = '-------'.substr(md5(rand(0,32000)),0,10);
        $encoded = "";
        if($postdata){
            while(list($k,$v) = each($postdata)){
                $encoded .= "--$boundary\r\nContent-Disposition: form-data; name=\"".rawurlencode($k)."\"\r\n\r\n";
                $encoded .= rawurlencode($v)."\r\n";
            }
        }
        if($files){
            foreach($files as $name=>$file){
                $ext= strtolower(strrchr($file,"."));
                switch($ext){
                    case '.gif':
                        $type = "image/gif";
                        break;
                    case '.jpg':
                        $type = "image/jpeg";
                        break;
                    case '.png':
                        $type = "image/png";
                        break;
                    default:
                        $type = "image/jpeg";
                }
                $encoded .= "--$boundary\r\nContent-Disposition: form-data; name=\"".rawurlencode($name)."\"; filename=\"$file\"\r\nContent-Type: $type\r\n\r\n";
                $encoded .= join("", file($file));
                $encoded .= "\r\n";
            }
        }
        $encoded .= "--$boundary--\r\n";
        $length = strlen($encoded);
        
        $uri = parse_url($url);
        $fp = fsockopen($uri['host'], $uri['port'] ? $uri['port'] : 80);
        if(!$fp)
            return "Failed to open socket to ".$uri['host'];
        
        fputs($fp, sprintf("POST %s%s%s HTTP/1.0\r\n", $uri['path'], $uri['query'] ? "?" : "", $uri['query']));
        fputs($fp, "Host: ".$uri['host']."\r\n");
        fputs($fp, "Content-type: multipart/form-data; boundary=$boundary\r\n");
        fputs($fp, "Content-length: $length\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        fputs($fp, $encoded);
        
        $results = "";
        while(!feof($fp)){
            $results .= fgets($fp,1024);
        }
        fclose($fp);
        return preg_replace('/^HTTP(.*?)\r\n\r\n/s','',$results);
    }
?>