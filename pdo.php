<?php
session_start();
    $Host = '127.0.0.1';
    $Database = 'message_board';
    $User = 'root';
    $Password = 'root';
    $con = new PDO("mysql:host=$Host;dbname=$Database", $User, $Password);

    function prepare($sql,$data = array()){//封装预处理语句
        global $con;
        $stm=$con->prepare($sql);
        if($data !=NULL){
            $stm->execute($data);//预备的参数用数组传入
        }else{
            $stm->execute();
        }   
        $check = preg_match("/insert/",$sql);//判断是否是插入
        if($check){
            $mes = $con->lastInsertId();//返回插入的id值
        }else{
            $mes=$stm->fetchAll();//返回结果
        }
        return $mes;
    }

    function query($sql){
        global $con;
        $res = $con->query($sql);
         foreach ($res as $key => $value){
             print_r($value);
         }
    }
    //跳转的封装
    function jump($url){
        echo "<script language='javascript' 
        type='text/javascript'>";  
        echo "window.location.href='$url'";  
        echo "</script>";  
    }