<?php
$name = strtolower($_GET["name"]);
	
if(!isset($_GET["cape"]))
{
//$newurl = "http://".$_SERVER["HTTP_HOST"]."/Minecraft/MinecraftSkins/".$name;
header("Location: "."http://mcmyskin.com/Minecraft/MinecraftSkins/".$name);
}else{
//$newurl = "http://".$_SERVER["HTTP_HOST"]."/Minecraft/MinecraftCapes/".$name;
header("Location: "."http://mcmyskin.com/Minecraft/MinecraftCapes/".$name);
}
?>