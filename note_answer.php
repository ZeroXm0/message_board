<?php
require_once("header.php");
$note_id = isset($_GET['num'])?$_GET['num']:"";
$author = isset($_GET['author'])?$_GET['author']:"";
$datetime = date("Y-m-d H:i:s");
$content = isset($_POST['content'])?$_POST['content']:"";
if($note_id !=""&&$content !=""){
    $data = array($note_id,$author,$content,$datetime);
    $sql = 'INSERT INTO note_answer (noan_note_id,noan_user_name,noan_content,noan_time) VALUES(?,?,?,?)';
    $res = prepare($sql,$data);//写入回复
    $sql ='UPDATE note SET note_answer=? WHERE note_id=?';
    $res = prepare($sql,array(1,$note_id));//更新回复状态
}else{
    echo "<script>alert('参数缺失或无内容~');</script>";
}
    jump('./note_book.php');

$delete_id = isset($_POST['delete'])?$_POST['delete']:"";
if($delete_id !=""){
    $sql = 'DELETE FROM note WHERE note_id=?';
    $res = prepare($sql,array($delete_id));//删除留言
}