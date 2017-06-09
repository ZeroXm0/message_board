<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 align="center">添加敏感词</h3>
    <form action="" method="POST">
        <table class="board" style='border:0;'>
                <tr><td><input style="outline:none;width:80%;padding:2px 8px;margin:5px 10%;" name="word" type="text" value="" maxlength="64"></td></tr>
                <tr><td align="center"><input type="submit" value="添加"></td></tr>
        </table>
    </form>
<?php
$filename = './filterwords.txt';
//输出敏感词
$content = fopen($filename, "r");
$res =array();
$i=0;
//逐行内容添加到数组res，直到文件结束为止。
while(! feof($content)){
    $res[$i]= fgets($content);//fgets()函数从文件指针中读取一行
    $i++;
}
fclose($content);
$res=array_filter($res);
echo "<br><br><div style='width:500px;'>";
for($i = 0;$i<count($res);$i++){
    echo "<span id='span".$i."'>".$res[$i];
    echo "<button type='button' class='delete btn btn-default btn-danger' id='".$i."'>删除</button>&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "</span>";
}
echo "</div>";
if($_POST){
    if($_POST['word']){//添加敏感词
        if(is_writable($filename)){
            $file = fopen($filename,'r+');
        }else{
            echo "文件".$filename."不可写";
        }
        //在文件尾写入
        fseek($file,0,SEEK_END);
        $str = $_POST['word'];
        $str=preg_replace('/\t/is',"",$str);
        $str=preg_replace('/\r\n/is',"",$str);
        $str=preg_replace('/\r/is',"",$str);
        $str=preg_replace('/\n/is',"",$str);
        $str=preg_replace('/ /is',"",$str);
        $result = preg_split('/[;\r,，]+/s', $str);//多个敏感词分隔
        for($i = 0;$i<count($result);$i++){//写入敏感词文件
            $word = $result[$i];
            fwrite($file,$word);
            fwrite($file,"\r\n");
        }
            echo "<script>alert('敏感词添加成功，走！去灌水~');</script>";
    }else if($_POST['key']){//删除敏感词
        $ln=$POST['key'];//需要删除的那一行内容
        //开始处理
        $arr=file($filename);//获取文件所有内容 
        $file=fopen($filename,'w');
        foreach ($arr as $line){
            if ($line <> $ln){//不等于
                fputs($filename, $line); 
            }
        }
    }
    fclose($file);
}
?>
<script>
// ajax发送post请求删除敏感词
    $('.delete').click(function(){
        var id = $(this).attr('id');//获得id
        	$.ajax({
			type : "POST",
            url : 'admin.php',
            async:true,
            dataType:'html',
            data: {
				key: id,
			},
            error:function(){
				alert("删除失败，不如跳舞~");
			},
            success:function(){
				$('#span'+id).remove();//删除成功，删除模块
                }    
        });
    })
</script>
</body>
</html>