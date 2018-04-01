<?php
/*
This Is The YucMedia Captcha Api Scripts
All Rights Reserved
*/

/*
YucMedia Captcha校验函数

$sitekey--是注册激活后获取的网站身份识别码，是一个25位的字符串。
$serialnum--是会话流水号。
$userresponse--是用户输入的验证码值。
$idenkey--也是注册激活后获取的网站身份校验码，也是一个25位的字符串。
$remoteip--用户ip地址。
$zbkey--网站位置标识符。
*/
function  geturlendata($argv){
$flag = 0;
$params = "";
foreach ($argv as $key=>$value)
{
if ($flag!=0)
{
$params .= "&";
$flag = 1;
}
$params.= $key."=";
$params.= urlencode($value);
$flag = 1;
}
return $params;
}

function yucmedia_verify($sitekey,$remoteip,$serialnum,$userresponse,$siteidenkey,$zbkey){
$urlendata=geturlendata(array(
                              'sitekey'=>$sitekey,
                                 'userip'=>$remoteip,
                                  'serialnum'=>$serialnum,
                                    'userresponse'=>$userresponse,
                                     'idenkey'=>$siteidenkey,
									   'zbkey'=>$zbkey
                                           ));
$length = strlen($urlendata);

$post = fsockopen('api.yucmedia.com',80,$errno,$errstr,10) or exit($errstr."—>".$errno);

$header = "POST /script/verify HTTP/1.0\r\n"; 
$header .= "Host:api.yucmedia.com\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
$header .= "Content-Length: ".$length."\r\n";
$header .= "User-Agent: yucmedia/PHP\r\n";
$header .= "Connection: Close\r\n\r\n";
$header .= $urlendata."\r\n";

fputs($post,$header);

while(!feof($post))
{
$response.= fgets($post,1024);
}
fclose($post); 
$response = explode("\r\n\r\n", $response, 2);
return $response[1];
}
?>
