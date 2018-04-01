<?php session_start(); 
 if(!isset($_SESSION["uid"]))die;
        print_r($_FILES);
 $username = strtolower($_SESSION["username"]);
 function processUploadedFile($file)
{   global $username;
    $acceptedType = array(
        'image/png',
        'image/x-png',
		'image/x-ms-bmp',
		'image/jpeg',
		'image/gif',
        );
    $maxSize = 512 * 1024; //512kb
    if (!in_array($file["type"], $acceptedType)) {
		unlink($file["tmp_name"]);
        echo "<script>alert('图片类型不支持。".print_r($file)."');</script>";
        return false;
    }
    if ($file["size"] > $maxSize) {
		unlink($file["tmp_name"]);
        echo "<script>alert('图片过大。');</script>";
        return false;
    }
    $sourcefile = $file["tmp_name"];
    if ($cusbg = moveFile($sourcefile,$username)) return $cusbg;
    else {
        return false;
    }
}
function moveFile($sor, $username)
{
    $dir = "Minecraft/Signatures/backgrounds/custombgs";
    if (!copy($sor, $dir."/".$username.".png") || !unlink($sor)){    
	     echo "<script>alert('无法处理图片。');</script>";
         return false; }
     return $dir."/".$username.".png";
}

 if(! $dest = processUploadedFile($_FILES['file']))die;
 
echo "<script>window.parent.callback('".$dest."')</script>";
?>