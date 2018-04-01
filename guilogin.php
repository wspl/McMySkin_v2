<?php
	if(!isset($_GET["name"]) or !isset($_GET["password"])){die();};
    include('mysql.php');
    $con = newlink("widesens_mms");
    mysql_query("SET NAMES utf8");
	$username = $_GET["name"];
	$password = $_GET["password"];
    $tp = mysql_query("select password from mmsusers where username='".$username."'");
    $num = mysql_num_rows($tp);
    if($num==0){die("2");}
  	$row = mysql_fetch_row($tp);
    mysql_close($con);
	if(trim($password) == $row[0]){ 
	echo 1;
	}else {echo 3;};

?>