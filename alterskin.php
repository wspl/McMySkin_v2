<?php

if (!isset($_GET['name']) or !isset($_GET['file'])) die();
$username = strtolower($_GET["name"]);
$file = $_GET["file"].".png";

$skindest = 'Minecraft/MinecraftSkins';
$capedest = 'Minecraft/MinecraftCapes';
$headdest = 'Minecraft/MinecraftHeads';

function alter($sourcefile, $dir, $username, $skin = "")
{
    global $lastError;
    $preview = $dir."/".$username."/preview/".$sourcefile;
	$sourcefile = $dir."/".$username."/".$sourcefile;
	if(!file_exists($sourcefile))die;
	 if(file_exists($dir."/".$username.".png")){
		 if (!unlink($dir."/".$username.".png"))
		  {    $lastError = "无法更换";
			   return false; }
		 };
     if (!copy($sourcefile, $dir."/".$username.".png"))
   {   $lastError = "无法创建文件";
	   return false; }
    $predir = sprintf("%s/%s", $dir, "preview");
    if (!copy($preview, $predir."/".$username.".png")){
		$lastError = "无法生成预览";
		 return false;
	}
	if($skin=="&skin"){
	$preview3d = imagecreatefrompng("http://".$_SERVER["HTTP_HOST"]."/3d.php?a=-20&w=25&ratio=10&name=".$username);
    imagealphablending($preview3d, true);
    imagesavealpha($preview3d, true);
    if (!imagepng ($preview3d, $predir."/".$username."_3d.png")){
		$lastError = "无法生成预览";
		 return false;
	}
	}
    return true;
}
function makeavatar()
{
    global $username, $skindest, $headdest;
    $image = $skindest . "/" . $username . ".png"; // 原图
    // imagepng ($image);
    $im = imagecreatefrompng($image);
    imagealphablending($im, true);
    imagesavealpha($im, true);

    $color = imagecolorat($im, 1, 1);
    imagecolortransparent($im, $color);
	
    $x = imagesx($im);
    $y = imagesy($im);
    $thumbw = $x * 0.125; // 期望的目标图宽
    $thumbh = $y * 0.25; // 期望的目标图高
    if (function_exists("imagecreatetruecolor"))
        $head = imagecreatetruecolor($thumbw, $thumbh); // 创建目标图gd2
    else
        $head = imagecreate($thumbw, $thumbh); // 创建目标图gd1
    $white = imagecolorallocatealpha($head,255,255,255,0);
    imagefill($head,0,0,$white);
    imagecopyresized ($head, $im, 0, 0, $thumbw, $thumbh, $thumbw, $thumbh, $thumbw, $thumbh);
    imagecopyresized ($head, $im, 0, 0, $thumbw * 5, $thumbh, $thumbw, $thumbh, $thumbw, $thumbh);
    if (!imagepng ($head, $headdest . "/" . $username . ".png")) return false;
    return true;
}
if (isset($_GET['cape'])){
	alter($file, $capedest, $username);
}else {
	alter($file, $skindest, $username, "&skin");
    makeavatar();
	}
		?>
