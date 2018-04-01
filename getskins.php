<?php
// ------------LOCKED------
if(!isset($_GET["name"]))die();
$uname = strtolower($_GET["name"]);
if(isset($_GET["cape"])){
$dest = 'Minecraft/MinecraftCapes';
}else{
$dest = 'Minecraft/MinecraftSkins';};
      $dir=$dest."/".$uname;
	  $dp = opendir($dir);
	  while($file=readdir($dp)){
		  if(preg_match("/.png/i",$file)){
		  $str=explode(".",$file);
		  echo $str[0].',';
		  }
	  }
	  closedir($dp);
	  
?>