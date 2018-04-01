<?php

define("BASEDIR","MinecraftHeads");
define("MAXSIZE",1024);
define("MINSIZE",8);
define("DEFAULTSIZE",64);
define("SUFFIX",".png");
define("DEFAULTNAME","default");
if (!isset($_GET["name"]) || !file_exists(($filename = BASEDIR.'/'.strtolower($_GET["name"]).SUFFIX)))
{
	$filename = DEFAULTNAME.SUFFIX;
/*
	header("HTTP/1.0 404 Not Found");
	die("Unknown File");
*/
}

if (!isset($_GET['size']))
	$size = DEFAULTSIZE;
else if (($size = $_GET['size'])>MAXSIZE)
	$size = MAXSIZE;
else if ($size<MINSIZE)
	$size = MINSIZE;
$src_img = imagecreatefrompng($filename);
$src_x = imagesx($src_img);
$src_y = imagesy($src_img);
$dest_img = imagecreatetruecolor($size,$size);
imagecopyresized($dest_img,$src_img,0,0,0,0,$size,$size,$src_x,$src_y);
header("Content-Type: image/png");
imagepng($dest_img);

?>
