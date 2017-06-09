<?php
require_once("./header.php");
if($_POST&&is_file('./filterwords.txt')){//验证敏感词文件
    $filter_word = file('./filterwords.txt');
    $str = $_POST['content'];
    for($i = 0;$i<count($filter_word);$i++){
        $check = preg_match("/".trim($filter_word[$i])."/i",$str);
        if($check){
            echo "<script>alert('留言中包含敏感词！！');history.back(-1);</script>";
            exit;
        }
    }
}

$content = $_POST['content'];
$user_name = $_POST['user_name'];
$title = $_POST['title'];
$username = isset($_SESSION["username"])?$_SESSION["username"]:"";
// $head = $_POST['head'].'.gif';
$note_flag = $_POST['checkbox'];

if($note_flag == 0&&empty($_SESSION["username"])){//悄悄话功能仅限用户使用
    echo "<script>alert('需要登录才可使用悄悄话哦~');location.href='index.php';</script>";
}else if($note_flag !=1 && $note_flag != 0){
    $note_flag = 1;
}
$datetime = date("Y-m-d H:i:s");
$filed = array(
    $user_name,
    $title,
    $content,
    // $head,
    $datetime,
    $username,
    $note_flag
    );
$sql = 'INSERT INTO note (note_user,note_title,note_content,note_time,user_name,note_flag) VALUES(?,?,?,?,?,?)';
$res = prepare($sql,$filed);
echo "<script>alert('茶壶又满了一点了啦~');</script>";
$url ="./index.php";
jump($url);
?>