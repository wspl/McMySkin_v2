<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ajax upload demo</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>


<!-- ajax upload-->
<script type="text/javascript" src="http://valums.com/files/2009/ajax-upload/ajaxupload.3.6.js"></script>
<!-- ajax upload;-->
<script type="text/javascript">
    /*         */
    $(document).ready(function() {
        new AjaxUpload('ownbg', {
            action : 'http://imagecraft.linuxteam.com/test.php',//请求目标
            name : 'upfile[]',//文件参数名
			data : {
			},
            multiple : false,//禁止多选文件
			onSubmit : function(file , ext){ 
               if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                 // 扩展名不允许 
                 alert('请上传图片文件！'); 
                 // 取消上传 
                 return false; 
               } 
            }, 
            onComplete : function(file, response) {
                alert(response);
            }     
                
        });
});
</script>
</head>
<body>
<button type="button" name="ownbg" id="ownbg" class="button" >  选择文件  </button>
</body>
</html>