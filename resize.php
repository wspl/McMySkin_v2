<?php
header("Content-type:image/png");
if (!isset($_GET['name']) or !isset($_GET['dest'])) die();
if(isset($_GET["skin"])){
function flip(&$img)
{
	$size_x = imagesx($img);
	$size_y = imagesy($img);
	$temp = imagecreatetruecolor($size_x, $size_y);
	$x = imagecopyresampled($temp, $img, 0, 0, ($size_x-1), 0, $size_x, $size_y, 0-$size_x, $size_y);
	return $temp;
}

// ԭʼ�ļ�
if (!isset($_GET['name'])) die();
$file= $_GET['name'];
if(preg_match("/.png/i",$file))
{   $new = explode(".",$file);
    $file = $new[0];
	};
$dest = 'Minecraft/Skinshop';
if(isset($_GET['dest'])){$dest= $_GET['dest'];}
$filename = $dest.'/'.$file.'.png';
if (!file_exists($filename))
{
	$filename = "Minecraft/char.png";
}


// ����ͼƬ����
$front = imagecreatetruecolor(240, 480);
$back = imagecreatetruecolor(240, 480);
$total = imagecreatetruecolor(555, 480);
@$source = imagecreatefrompng($filename);
if(!$source) die();
$x=imagesx($source);
$y=imagesy($source);
$b = 120;
$s = $y * 0.25;

$fsource = flip($source);

// Content type
header('Content-Type: image/png');

// ����͸��
imagealphablending($front, true);
imagealphablending($back, true);
imagealphablending($total, true);
imagealphablending($source, true);
imagealphablending($fsource, true);
imagesavealpha($front, true);
imagesavealpha($back, true);
imagesavealpha($total, true);
imagesavealpha($source, true);
imagesavealpha($fsource, true);

$color = imagecolorat($source, 1, 1);
imagecolortransparent($source, $color);
imagecolortransparent($fsource, $color);

$white = imagecolorallocatealpha($front,255,255,255,127);
imagefill($front,0,0,$white);
$white = imagecolorallocatealpha($back,255,255,255,127);
imagefill($back,0,0,$white);
$white = imagecolorallocatealpha($total,255,255,255,127);
imagefill($total,0,0,$white);



	// ��������
	
	// ͷ
	imagecopyresized($front, $source, $b / 2, 0, $s, $s, $b, $b, $s, $s);
	
	// ͷ��
	imagecopyresized($front, $source, $b / 2, 0, $s * 5, $s, $b, $b, $s, $s);
	
	// ����
	imagecopyresized($front, $source, $b / 2, $b, $s * 2.5, $s * 2.5, $b, $b * 1.5, $s, $s * 1.5);
	
	// ����
	imagecopyresized($front, $source, $b * 1.5, $b, $s * 5.5, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
	// ����
	imagecopyresized($front, $fsource, 0, $b, $s * 2, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
	// ����
	imagecopyresized($front, $source, 60, $b * 2.5, $s / 2, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
	// ����
	imagecopyresized($front, $fsource, $b * 1, $b * 2.5, $s * 7, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
    // ���ɱ���
	
	// ͷ
	imagecopyresized($back, $source, $b / 2, 0, $s * 3, $s, $b, $b, $s, $s);
	
	// ͷ��
	imagecopyresized($back, $source, $b / 2, 0, $s * 7, $s, $b, $b, $s, $s);
	
	// ����
	imagecopyresized($back, $source, $b / 2, $b, $s * 4, $s * 2.5, $b, $b * 1.5, $s, $s * 1.5);
	
	// ����
	imagecopyresized($back, $source, $b * 1.5, $b, $s * 6.5, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
	// ����
	imagecopyresized($back, $fsource, 0, $b, $s * 1, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
	// ����
	imagecopyresized($back, $source, $b * 1, $b * 2.5, $s * 1.5, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);
	
	// ����
	imagecopyresized($back, $fsource, 60, $b * 2.5, $s * 6, $s * 2.5, $b / 2, $b * 1.5, $s / 2, $s * 1.5);


    imagecopy( $total, $front, 0, 0, 0, 0, 240, 480); 
	imagecopy($total, $back, 315, 0, 0, 0, 240, 480); 

$width= 128 * 1.15625;
$height= 128;
if(isset($_GET['height'])){
  if($_GET['height']>=1024){
  $width= 512*1.15625;
  $height= 512;
  }else if ($_GET['height']<= 8){
  $width= 4*1.15625;
  $height= 4;
  }
  else{
  $width= $_GET['height']*1.15625;
  $height= $_GET['height'];
  }
}

imagesavealpha($total,true);
$x = imagesx($total);
$y = imagesy($total);
if(function_exists("imagecreatetruecolor"))
  $resized = imagecreatetruecolor($width, $height); // ����Ŀ��ͼgd2
else
  $resized = imagecreate($width, $height); // ����Ŀ��ͼgd1

imagealphablending($resized, true);
imagesavealpha($resized, true);
$trans_colour = imagecolorallocatealpha($resized, 0, 0, 0, 127);
imagefill($resized, 0, 0, $trans_colour);
    imagecopyresized ($resized,$total,0,0,0,0,$width,$height,$x,$y);

// ���
imagepng($resized);
imagedestroy($front);
imagedestroy($back);
imagedestroy($total);
imagedestroy($resized);
imagedestroy($source);
imagedestroy($fsource);
}else{

$file= $_GET['name'];
$dest = 'Minecraft/Skinshop';
if(isset($_GET['dest'])){$dest= $_GET['dest'];}

if(preg_match("/.png/i",$file))
{   $new = explode(".",$file);
    $file = $new[0];
	};

$width= 166;
$height= 128;
if(isset($_GET['width'])){
  if($_GET['width']>=1024){
  $width= 1024;
  $height= $width *102/132;
  }else if ($_GET['width']<= 8){
  $width= 8;
  $height= $width *102/132;
  }
  else{
  $width= $_GET['width'];
  $height= $_GET['width']*102/132;
  }
}

$image = $dest.'/'.$file.'.png'; // ԭͼ
$im = imagecreatefrompng($image);
imagesavealpha($im,true);
$x = imagesx($im);
$y = imagesy($im);

$thumbw = $width; // ������Ŀ��ͼ��
$thumbh = $height; // ������Ŀ��ͼ��
if(function_exists("imagecreatetruecolor"))
  $thumb = imagecreatetruecolor($thumbw, $thumbh); // ����Ŀ��ͼgd2
else
  $thumb = imagecreate($thumbw, $thumbh); // ����Ŀ��ͼgd1
imagealphablending($thumb, true);
imagesavealpha($thumb, true);
$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
imagefill($thumb, 0, 0, $trans_colour);
imagecopyresized ($thumb,$im,0,0,0,0,$thumbw,$thumbh,$x,$y);
imagepng ($thumb);
imagedestroy($thumb);
}

?>