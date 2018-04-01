<?php

if (!isset($_GET['name']) or !isset($_GET['skin']) or !isset($_GET['md5'])) die();
if(preg_match("/.png/i",$filename))
{   $new = explode(".",$filename);
    $file = $new[0];
	};
	
   if(isset($_GET['alter'])){
       $dest = 'Minecraft/MinecraftSkins/'.$_GET['name'];
   }else{$dest = 'Minecraft/MinecraftSkins';}
   
$file = $dest.'/'.$filename.'.png';

   if (!file_exists($file)){die(0);}
   
if($_GET["MD5"] == md5_file($file)){die(1);}else{die(0);};

		?>
