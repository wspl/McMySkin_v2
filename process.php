<?php session_start(); 
 if(!isset($_SESSION["uid"]))die;?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
function refresh(){
window.parent.location.href=window.parent.location.href;
}
</script>
<?php 
include("bases.php");

$lastError = '';
$headdest = 'Minecraft/MinecraftHeads';
include("panel.inc.php");

if(isset($_SESSION["uid"])){$username = strtolower($_SESSION["username"]);}

/**
 * 判断文件夹是否存在
 *
 */
function create_folders($dir){
       return is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir));
}

// ------------Check form---------
if (isset($_POST["submit"])) {
    if (trim($_POST["submit"])=="上传") {
        if (!empty($_FILES['file']["type"])) {
			if($_POST["type"]=="skin"){
            if (processUploadedFile($_FILES['file'], $skindest,$numlimited, "&skin")) {
                echo '皮肤上传成功！'; }else echo $lastError;
			}elseif($_POST["type"]=="cape"){
            if (processUploadedFile($_FILES['file'], $capedest,$numlimited)) {
                echo '披风上传成功！'; }else echo $lastError;
			}
			
		  echo "<script>";
          echo  "window.setTimeout('refresh();', 1000);";
          echo "</script>";
        }else{
            echo "没有上传任何文件。";
        }
    }else if (trim($_POST["submit"])=="应用"){
      if ($_POST["type"]=="skin") {
	        alter($_POST["file"], $skindest, $username, "&skin");
		    makeavatar();
      }else if ($_POST["type"]=="cape") {
		  alter($_POST["file"], $capedest, $username);
      }else{die;}
    }else if (trim($_POST["submit"])=="删除"){
		$files = explode(",",$_POST["file"]);
		$previews = explode(",",$_POST["preview"]);
		$sucess = true;
		foreach($files as $file){
		  if (!file_exists($file)){continue;}
		   delete($file);
		};
		foreach($previews as $preview){
		  if (!file_exists($preview)){continue;}
		   delete($preview);
		};
    }else if (trim($_POST["submit"])=="添加"){
			if($_POST["type"]=="skin"){
            if (processRemoteFile($_POST["url"], $skindest,$numlimited, "&skin")) {
                echo '皮肤添加成功！'; }else echo $lastError;
			}elseif($_POST["type"]=="cape"){
            if (processRemoteFile($_POST["url"], $capedest,$numlimited)) {
                echo '披风添加成功！'; }else echo $lastError;
			}else{echo "……";}
		  echo "<script>";
          echo  "window.setTimeout('refresh();', 1000);";
          echo "</script>";
    }
}

function processRemoteFile($url, $destdir,$numlimited, $skin="")
{
    global $username, $lastError;
	$temp_dir = $destdir."/temp";
    create_folders($temp_dir);
	if(get_file($url,$temp_dir,"temp.png")){
    $sourcefile = $temp_dir."/temp.png";
	}else return false;
    if (moveFile($sourcefile, $destdir,$username,$numlimited,$skin)) return true;
    else {
        return false;
    }
}

	function get_file($url,$folder,$pic_name){	
	
    global $lastError;
		set_time_limit(30); //限制最大的执行时间
		if(!preg_match("/http:/i",$url)){$url = "http://".$url;}
		$fileHeaders = get_remote_file_headers($url);
		if($fileHeaders === false){
			$lastError = "获取图片失败。";
            return false;
		};
    if ($fileHeaders["fileType"] != "image/png" && $fileHeaders["fileType"] != "image/x-png") {
		if($fileHeaders["fileType"] == "application/force-download"){
			 $filetype = substr($url,-3,3);
             if ($filetype != "png") {
               $lastError = "图片类型不支持。";
               return false;
             }
		}else{
           $lastError = "图片类型不支持。";
           return false;
		}
    }
	if($fileHeaders["fileSize"] == null){
        $lastError = "获取图片失败。";
		return false;
		}
	if($fileHeaders["fileSize"] > 512*1024){
        $lastError = "图片过大。";
		return false;
		}
		$destination_folder = $folder?$folder.'/':''; //文件下载保存目录
		$newfname = $destination_folder.$pic_name;//文件PATH
		$file = fopen($url,'rb');
		
		if($file){			
			$newf = fopen($newfname,'wb');
			if($newf){				
				while(!feof($file)){					
					fwrite($newf,fread($file,1024*8),1024*8);
				}
			}
			if($file){				
				fclose($file);
			}
			if($newf){				
				fclose($newf);
			}
		}
	return true;
	}
	
function get_remote_file_headers($url) 
{
    $curl = curl_init($url);
    // 不取回数据
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    // 发送请求
    $result = curl_exec($curl);
	$Headers["statusCode"]="404";
    // 如果请求没有发送失败
    if ($result !== false) 
    {
        $Headers["statusCode"] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $Headers["fileType"] = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        $Headers["fileSize"] = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    }
    curl_close($curl);
        // 再检查http响应码是否为200
        if ($Headers["statusCode"] == 200)
        {
            return $Headers;   
        }
 
    return false;
}


function alter($sourcefile, $dir, $username, $skin = "")
{
    global $lastError,$sitehost;
	 if(file_exists($dir."/".$username.".png")){
		 if (!unlink($dir."/".$username.".png"))
		  {    $lastError = "无法更换";
			   return false; }
		 };
     if (!copy($sourcefile, $dir."/".$username.".png"))
   {   $lastError = "无法创建文件";
	   return false; }
    $predir = sprintf("%s/%s", $dir, "preview");
    create_folders($dir);
    create_folders($predir);
    $preview = imagecreatefrompng("http://".$sitehost."/resize.php?&name=".$username."&dest=".$dir.$skin);
    imagealphablending($preview, true);
    imagesavealpha($preview,true);
    if (!imagepng ($preview, $predir."/".$username.".png")){
		$lastError = "无法生成预览";
		 return false;
	}
	if($skin=="&skin"){
	$preview3d = imagecreatefrompng("http://".$sitehost."/3d.php?a=-20&w=25&ratio=10&name=".$username);
    imagealphablending($preview3d, true);
    imagesavealpha($preview3d, true);
    if (!imagepng ($preview3d, $predir."/".$username."_3d.png")){
		$lastError = "无法生成预览";
		 return false;
	}
	}
    return true;
}

function delete($sourcefile)
{
    if (!unlink($sourcefile)) {
		$lastError = "无法删除";
     	return false;
	   }
    return true;
}


function moveFile($sor, $userdir, $username, $numlimited,$skin)
{
    global $lastError,$sitehost;
    $dir = sprintf("%s/%s", $userdir, $username);
    create_folders($dir);
	 $continute=false;
	 for($i=1; $i<=$numlimited; $i++){
		 if(!file_exists($dir."/preview/".$username.$i.".png")){
		 $continute=true;
		 $num=$i;
		 break;};
	 }
    if($continute==true){
          if (!copy($sor, $dir."/".$username.$num.".png") || !unlink($sor))
		  {    $lastError = "无法创建文件";
			   return false; }

          $predir = sprintf("%s/%s", $dir, "preview");
          create_folders($dir);
          create_folders($predir);
          $preview = imagecreatefrompng("http://".$sitehost."/resize.php?&name=".$username.$num."&dest=".$dir.$skin);
          imagesavealpha($preview,true);
		  if (!imagepng ($preview, $predir."/".$username.$num.".png")){
			  $lastError = "无法生成预览";
			  return false;
			}
          return true;
	}else {
		$lastError = "你的库存已满，请先删除一些再上传。";
		return false;}
}

function processUploadedFile($file, $destdir,$numlimited, $skin="")
{
    global $username, $lastError;
    $acceptedType = array(
        'image/png',
        'image/x-png'
        );
    $maxSize = 512 * 1024; //1MB
    if (!in_array($file["type"], $acceptedType)) {
        $lastError = "图片类型不支持。";
        return false;
    }
    if ($file["size"] > $maxSize) {
        $lastError = "图片过大。";
        return false;
    }
    $sourcefile = $file["tmp_name"];
    if (moveFile($sourcefile, $destdir,$username,$numlimited,$skin)) return true;
    else {
        return false;
    }
}
function makeavatar()
{
    global $username, $skindest, $headdest;
    $username = $username;
    $image = $skindest . "/" . $username . ".png"; // 原图
    // imagepng ($image);
    $im = imagecreatefrompng($image);
    imagealphablending($im, true);
    imagesavealpha($im, true);

    $color = imagecolorat($im, 1, 1);
    imagecolortransparent($im, $color);
	
    $x = imagesx($im);
    $y = imagesy($im);
    $thumbw = $x * 0.125; // 期望的目标图宽
    $thumbh = $y * 0.25; // 期望的目标图高
    if (function_exists("imagecreatetruecolor"))
        $head = imagecreatetruecolor($thumbw, $thumbh); // 创建目标图gd2
    else
        $head = imagecreate($thumbw, $thumbh); // 创建目标图gd1
    $white = imagecolorallocatealpha($head,255,255,255,0);
    imagefill($head,0,0,$white);
    imagecopyresized ($head, $im, 0, 0, $thumbw, $thumbh, $thumbw, $thumbh, $thumbw, $thumbh);
    imagecopyresized ($head, $im, 0, 0, $thumbw * 5, $thumbh, $thumbw, $thumbh, $thumbw, $thumbh);
    if (!imagepng ($head, $headdest . "/" . $username . ".png")) return false;
    return true;
}


?>