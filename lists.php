<?php session_start();
 header("Content-type: text/html; charset=utf-8");
   $limit = 0;
   $curpage=1;
 if(isset($_GET['page'])){
   $limit = $_GET["page"] * 15 -15;
   $curpage=$_GET['page'];
  }
  include('mysql.php');
  $con = newlink("widesens_mms");
  mysql_query("SET NAMES utf8");
  if(!isset($_GET["donate"])){
  $res = mysql_query("SELECT * FROM `userbase` WHERE `genuine`=1 order by uid DESC limit ".$limit.",15");
  $num = mysql_fetch_row(mysql_query("select count(uid) from userbase where `genuine`=1"));
  }else{
  $res = mysql_query("SELECT * FROM `donator` order by id DESC limit ".$limit.",15");
  $num = mysql_fetch_row(mysql_query("select count(id) from donator"));
  }
  $pages=ceil($num[0]/15);
?><head>
<style type="text/css">
.ListTitle {
	color: #FFF;
	font-weight: bold;
	font-size: 26px;
}
.ListText {
	color: #FFF;
	font-size: 16px;
	padding-left:30px;
}
.ListName {
	color: #FFF;
	font-size: 16px;
	padding-left:10px;
}
a:link {
	color: #8fe69c;
}
a:visited {
	color: #8fe69c;
}
a:hover {
	color: #000000;
}
a:active {
	color: #8fe69c;
}
</style>
<script type="text/javascript" src="mcmyskin.js" charset="UTF-8"></script>
<script src="http://mcmyskin.googlecode.com/files/cufon-yui.js" type="text/javascript"></script> 
<?php
 if(isset($_COOKIE["language"]) && $_COOKIE["language"]=="cht"){
	echo '<script src="http://mcmyskin.googlecode.com/files/font.FZZhunYuan.js?r=1" type="text/javascript"></script> ';
 }else{
	echo '<script src="http://mcmyskin.googlecode.com/files/font.ShiShangZhongHeiJianTi3.js?r=1" type="text/javascript"></script> ';
 }
?>
<script type="text/javascript" src="cufon.js"></script>
</head>
           


<table border="0" style="width:370px;text-align:left;">
              <tr>
                <td width="<?php echo isset($_GET["donate"])?"40%":"30%"; ?>">
                   <p class="<?php echo isset($_GET["donate"])?'ListName':'ListText'; ?> cufon"><?php echo isset($_GET["donate"])?"名字":"UID"; ?></p>
                </td>
                <td width="<?php echo isset($_GET["donate"])?"30%":"40%"; ?>">
                   <p class="<?php echo isset($_GET["donate"])?'ListText':'ListName'; ?> cufon" style=" <?php echo isset($_GET["donate"])?"text-align:right;":""; ?> "><?php echo isset($_GET["donate"])?"金额":"ID"; ?></p>
                </td>
                <td>
                   <p class="ListText cufon"><?php echo isset($_GET["donate"])?"时间":"加入时间"; ?></p>
                </td>
              </tr>
              <?php
			    for($i=1;$i<=15;$i++){
			      if($row = mysql_fetch_array($res,MYSQL_ASSOC)){
					  $uid=isset($_GET["donate"])?$row["name"]:$row["uid"];
$name=isset($_GET["donate"])?$row["number"]."元":$row["username"];
					  preg_match_all("/\-([0-9]{2}\-[0-9]{2})/i",isset($_GET["donate"])?$row["date"]:$row["registerdate"],$array);
					  $date=$array[1][0];
				  }else{
					  $uid="";
					  $name="";
					  $date="";
				  }
			  ?>
              <tr>
                <td height="30px">
                <?php
				 if(preg_match("/[\x80-\xff]./", $uid))
				    echo "<p class=\"".(isset($_GET["donate"])?'ListName':'ListText')."\">".$uid."</p>";
				 else
				    echo "<p class=\"".(isset($_GET["donate"])?'ListName':'ListText')." cufon\">".$uid."</p>";
				?>
                </td>
                <td style=" <?php echo isset($_GET["donate"])?"text-align:right;":""; ?> ">
                   <p class="<?php echo isset($_GET["donate"])?"ListText":"ListName"; ?> cufon"><?php echo $name; ?></p>
                </td>
                <td>
                   <p class="ListText cufon"><?php echo $date; ?></p>
                </td>
              </tr>
              <?php
				}
			  ?>
              <tr>
              <td colspan="3" style="text-align:right;">
              <div class="cufon" style="padding-right:30px;">
              <?php
			    $start= $curpage<=3?1:($curpage+2>$pages?$pages-4:$curpage-2);
				$times=($start+4<=$pages?$start+4:$pages);
				if($curpage>3)echo "<a href=\"lists.php?page=1\"><<</a>&nbsp;&nbsp;";
			    for($i=$start;$i<=$times;$i++){
				  if($i==$curpage)
				   echo "<strong>".$curpage."</strong>&nbsp;&nbsp;";
				  else
				   echo "<a href=\"lists.php?page=".$i."\">".$i."</a>&nbsp;&nbsp;";
				}
				if($pages>$times)echo "<a href=\"lists.php?page=".$pages."\">>></a>&nbsp;&nbsp;";
			  ?>
              </div>
              </td>
              </tr>
           </table>