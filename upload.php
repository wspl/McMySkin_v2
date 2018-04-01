<?php
session_start();
if(!isset($_GET["type"]))die;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="McMySkin,Minecraft,皮肤,分享,下载,游戏" />
<meta name="description" content="国内最好的Minecraft皮肤中心，支持所有Minecraft版本使用皮肤与披风。" />
<meta name="author" content="plqws,puredark" />
<script type="text/javascript">
  function refresh(){
	  window.location.href="index.php"; 
	  parent.window.location.href="index.php"; 
  }
</script>
<style type="text/css">
* {
	font-family: "微软雅黑";
}
#form1 .upforms2 {
	font-size: 12px;
}
</style>
<?php
	if(!isset($_SESSION["uid"])){echo "<script>refresh();</script>;";}
?>
<form action="process.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <p><img src="./Image/panel/upload_title.png"/></p>
    <hr align="center" size="1" noshade="noshade" />
  <p><span class="upforms2"><strong>（添加/上传的皮肤皆</strong><u>必须是小于512KB的PNG图片</u><strong>）</strong></span></p>
  <p><strong>1. 本地上传：</strong></p>
    <p>
      <label for="skinfile"></label>
      <input type="file" name="file" id="file" accept="image/x-png,image/png" />
    </p>
    <p>
      <input type="hidden" name="type" value="<?php echo $_GET["type"]; ?>" id="type" />
          <input type="submit" name="submit" id="submit" value="  上传  " />
        </p>
        <hr align="center" size="1" noshade="noshade" />
    <p><strong>2. 用网络地址添加：</strong></p>
    <p>地址：
      <label for="url"></label>
      <input name="url" type="text" id="url" />
    </p>
    <p>
      <input type="submit" name="submit" id="submit" value="  添加  " />
    </p>
  </form>
