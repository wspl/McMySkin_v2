<?php
if(!isset($_GET["name"]))die;
$name = strtolower($_GET["name"]);
	

$newurl = "http://".$_SERVER["HTTP_HOST"]."/Minecraft/Signatures/".$name.".png?r=".date("YmdHis");
if(file_exists("Minecraft/Signatures/".$name.".png")){
header("Location: ".$newurl);}
else{
header("Location: http://".$_SERVER["HTTP_HOST"]."/Minecraft/Signatures/backgrounds/default.png");
}
?>