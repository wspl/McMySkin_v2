<?php session_start(); 
 if(!isset($_SESSION["uid"])){
        header("Location: index.php");  //重定向浏览器 
        exit;  //确保重定向后，后续代码不会被
		}; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	include("bases.php");
	include("panel.inc.php");
	$lowerusername = strtolower($_SESSION["username"]);
?>
<head>
<title>McMySkin 皮肤中心 - 披风管理面板</title>
<?php
 include ('header.php');
?>
<script type="text/javascript">
$(document).ready(function() {
  $("#btnApply").click(function(){
	  var num = 0;
	  var filearr = new Array();
	  var previewarr = new Array();
    $("#skinbox.selected").each(function(){
	  filearr[num] = $(this).attr("file");
	  previewarr[num] = $(this).attr("preview");
	  num = num + 1;
    });
  if(num = 1){
	  if(filearr[0] != "<?php echo $capedest."/".$lowerusername.".png"; ?>"){
     $.post("process.php",{"submit": "应用" , file: filearr[0], preview: previewarr[0], type: "cape"},function(result){
	 window.location.href=window.location.href;});
	  }
  }
  if(num > 1){
	  if(filearr[0] != "<?php echo $capedest."/".$lowerusername.".png"; ?>"){
     $.post("process.php",{"submit": "应用" , file: filearr[0], preview: previewarr[0], type: "cape"},function(result){
	 window.location.href=window.location.href;});
	  }else{
     $.post("process.php",{"submit": "应用" , file: filearr[1], preview: previewarr[1], type: "cape"},function(result){
	 window.location.href=window.location.href;});}
  }
  });
  $("#btnDelete").click(function(){
	  var num = 0;
	  var filearr = new Array();
	  var previewarr = new Array();
    $("#skinbox.selected").each(function(){
	  filearr[num] = $(this).attr("file");
	  previewarr[num] = $(this).attr("preview");
	  num = num + 1;
    });
      $.post("process.php",{"submit": "删除" , file: filearr.toString(), preview: previewarr.toString()},function(result){
	window.location.href=window.location.href;});
  });
});
</script>

</head>
<body>
<SCRIPT language=JavaScript>
document.onselectstart=new Function("event.returnValue=false;");
</SCRIPT>
        <br />
        <br />
<table border="0" align="center" class="mainbody">
  <tr>
      <td id="cube1" class="mmsTitle" scope="col">
      <a href="index.php"><img src="Image/logo.png" name="logo" id="logo" /></a>
      </td>
      <td id="cube2" scope="col">
      <strong class="zPageTitle cufon">披风管理</strong>
      </td>
  </tr>
  <tr>
      <td id="cube3" class="MainInfo">
         <table width="700" height="250" border="0" align="center">
            <tr>
               <td width="375" height="38" bgcolor="#3C7BFF" style="padding-left:20px"><span class="Panel cufon">3D预览</span></td>
               <td width="375" bgcolor="#3C7BFF" style="padding-left:20px"><span class="Panel cufon">当前皮肤</span></td>
            </tr>
            <tr>
               <td bgcolor="#5189FF" style="text-align:center;overflow: hidden;">
    <div id="skinViewerFloat">
            <object width="320" height="320" type="application/x-java-applet">
                <param name="name" value="<?php echo $lowerusername; ?>"/>
                <param name="eastereggs" value='<?php echo $eastereggs[$i]; ?>'/>
                <param name="code" value="net.minecraft.skintest.ModelPreviewApplet"/>
                <param name="archive" value="skinviewer.jar"/>
                <param name="codebase" value="."/>
            </object>
    </div>
              </td>
              <td bgcolor="#5189FF" style="text-align:center;">
        <div id="skinbox" class="skinbox" style="margin:auto;float:none;" file="<?php echo $capedest."/".$lowerusername.".png"; ?>" preview="<?php echo $capedest."/preview/".$lowerusername.".png"; ?>" >
              <img src="Image/panel/Check.png" class="check" />
              <?php
		        if (file_exists($capedest."/".$lowerusername.".png")){
		        echo "<p><img src='".$capedest."/preview/".$lowerusername.".png?r=".date("YmdHis")."' /></p>";
	   	        }
              ?>
        </div>
               </td>
            </tr>
         </table>
    <table width="686" height="77" border="0" align="center">
      <tr>
        <td width="224"><img src="Image/panel/upload.png" alt="上传" name="btnUpload" width="160" height="55" class="upload fancybox.iframe" id="btnUpload" href="upload.php?type=cape" /></td>
        <td width="224"><img src="Image/panel/apply.png" alt="应用" name="btnApply" width="160" height="55" id="btnApply" onclick="process('应用')" /></td>
        <td width="224"><img src="Image/panel/delete.png" alt="删除" name="btnDelete" width="160" height="55" id="btnDelete" onclick="process('删除')" /></td>
      </tr>
    </table>
      <table width="700" border="0" align="center">
      <tr>
        <td width="700" height="38" bgcolor="#3C7BFF" style="padding-left:20px"><span class="Panel">可用披风</span></td>
      </tr>
      <tr height="250">
        <td bgcolor="#5189FF"  style="padding-bottom:15px;vertical-align:cental;">
        <div id="cover" class="cover">
   <?php
      $dir=$capedest."/".$lowerusername;
	  $predir = $dir."/preview";
	  $capenum = 0;
	  if(@$dp = opendir($predir)){
	  while($file=readdir($dp)){
		  if ($file!='.' && $file!='..'){
	?>
        <div  id="skinbox" class="skinbox" file="<?php echo $dir."/".$file; ?>" preview="<?php echo $predir."/".$file; ?>" >
		  <p><img width="166" height="128" src='<?php echo $predir."/".$file."?r=".date("YmdHis"); ?>' /></p>
		<img src="Image/panel/Check.png" class="check" />
        </div>
    <?php
	  $capenum++;
		  }
	  }
	  closedir($dp);
	  }
	  ?>
        </div>
        </td>
      </tr>
     </table>
      </td>
    <td id="cube4" style="vertical-align:top">
    <font class='cufon'>
    <table>
    <tr>
    <td style="vertical-align:top; padding-top:5px;">
        <table id="button" width="199" height="153" border="0" align="center">
        <tr>
          <td width="76" scope="col"><img src="<?php echo $avatar; ?>" width="64" height="64" class="amenu" id="avatar" /></td>
          <td width="130" height="77" colspan="2" scope="col" id="username"><?php echo $username; ?></td>
        </tr>
        <tr>
          <th height="35" colspan="3">披风总量 <?php echo $capenum."/".$numlimited; ?></th>
        </tr>
        <tr>
          <th id="capepanel" height="35" colspan="3" onclick="jumpto('skinpanel.php')">[管理皮肤]</th>
        </tr>
        <tr>
          <th height="35" colspan="3" onclick="jumpto('signrender.php')">[生成签名]</th>
        </tr>
        <tr>
          <th height="35" colspan="3" onclick="jumpto('index.php?quit')">[退出]</th>
        </tr>
        </table>
    </td>
    </tr>
    <tr>
    <td style="vertical-align: bottom; padding-top:15px;padding-bottom:5px;">
      <table id="button" height="249" border="0" align="center">
   <?php
       foreach($button as $info){
         echo '<tr>';
         echo $info;
         echo '</tr>';
	   }
   ?>
      </table>
    </td>
    </tr>
    </table>
      </font>
    </td>
  </tr>
  <tr>
      <td height="74" colspan="2" class="mmsFooter">
        <font class='cufon'><?php echo $footer; ?></font>
      </td>
  </tr>
</table><p></p>
