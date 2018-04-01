<?php session_start(); 
if(!isset($_SESSION["uid"]))die;
date_default_timezone_set('PRC');
mb_internal_encoding("UTF-8"); // 设置编码

  $avatar = $_POST["avatar"];
  $username=strtolower($_SESSION["username"]);
  $level=$_SESSION["groupid"];
  $bg = $_POST["bg"];
  $idcolor   =   "#81b6cc";  
  $messcolor   =   "#81b6cc";  
if(isset($_POST["idcolor"])){$idcolor   =   $_POST["idcolor"]; }
if(isset($_POST["messcolor"])){$messcolor   =   $_POST["messcolor"]; }
if(isset($_POST["fontsize"]))
     $fontsize=$_POST["fontsize"];
else $fontsize=14;
if($_POST["message"]==""){
	$message = "";
}else{
	$message = $_POST["message"];
	$message = str_replace("\\\\n", "\n", $message);
	$message = str_replace("\\", "", $message);
}
  $custombgurl = $_POST["custombgurl"];
  $mask = $_POST["mask"];
  $font = $_POST["font"];


  include('mysql.php');
  $con = newlink("widesens_mms");
  mysql_query("SET NAMES utf8");
  $res = mysql_query("SELECT * FROM signatures WHERE username='".$username."'");
  $num = mysql_num_rows($res);
  if($num>0){
  $userinfo = mysql_fetch_array($res);
  $lasttime = $userinfo["lastupdate"];
  }else {
	  $lasttime = "20012-03-06 21:06:05";
  }
  
  $timestamp = strtotime($lasttime);
  
if(time()-$timestamp >10 ){


  $post_str = array( "avatar"=>$avatar,
                     "username"=>$_SESSION["username"],
					 "groupid"=>$_SESSION["groupid"],
					 "genuine"=>$_SESSION["genuine"],
					 "bg"=>$bg,
					 "idcolor"=>$idcolor,
					 "messcolor"=>$messcolor,
					 "font"=>$font,
					 "fontsize"=>$fontsize,
					 "message"=>$message,
					 "custombgurl"=>$custombgurl,
					 "mask"=>$mask);
					 

$data = http_build_query($post_str);

$opts = array (
'http' => array (
'method' => 'POST',
'header'=> "Content-type: application/x-www-form-urlencoded\r\n" .
"Content-Length: " . strlen($data) . "\r\n",
'content' => $data
)
);

$context = stream_context_create($opts);
$url = file_get_contents('http://'.$_SERVER["HTTP_HOST"].'/signature-remote.php', false, $context);

echo $url."?r=".date("YmdHis");
  //preg_match_all("/http:\/\/[a-zA-Z]+\.[a-zA-Z]+.[a-zA-Z]+\/[0-9a-zA-Z]+\.(jpg|gif|bmg|jpeg|png)/i",$resp_str,$array);
  //$url = $resp_str;
  //echo socket_REQUEST('http://www.mcmyskin.com/signature-remote.php', $post_str);
  if($num>0){
      mysql_query("UPDATE signatures SET `idcolor`='".$idcolor."',`messcolor`='".$messcolor."',`message`='".$message."',`avatar`='".$avatar."',`custombg`='".$custombgurl."',`lastupdate`='".date("Y-m-d H:i:s")."' WHERE username = '".$username."'");
  }else {
	  mysql_query("INSERT INTO `signatures`(`uid`, `username`, `idcolor`, `messcolor`, `message`, `avatar`, `custombg`, `lastupdate`) VALUES ('".$_SESSION["uid"]."','".$_SESSION["username"]."','".$idcolor."','".$messcolor."','".$message."','".$avatar."','".$custombgurl."','".date("Y-m-d H:i:s")."')");
  }
  }else die;
  
?>