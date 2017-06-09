<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//cdn.bootcss.com/bootstrap/3.0.1/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="//cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.staticfile.org/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <title>茶水间</title>
    <style>
        * {
            margin: 0 auto;
            padding: 0;
        }

        .banner {
            position: relative;
            width: 100%;
            height: 150px;
            background: url(./images/banner.jpg) center no-repeat;
            background-size: cover;
        }

        .banner ul {
            list-style: none;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .banner li {
            float: left;
            margin-right: 10px;
            background: lightblue;
            border-radius: 10px;
            letter-spacing: 5px;
            cursor: default;
        }

        .banner li:hover {
            background: skyblue;
        }

        a {
            text-decoration: none;
        }

        .center ul {
            text-align: center;
        }

        .center li,
        .center a {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background: lightgreen;
        }

        .action a {
            background: skyblue;
        }

        .board {
            width: 600px;
            background: lightgray;
            border: 2px solid gray;
            border-radius: 10px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="banner">
        <ul>
            <li><a class="btn" href="./index.php">留言</a></li>
            <li><a class="btn" href="./note_book.php">留言簿</a></li>
<?php
    require_once("pdo.php");
    date_default_timezone_set("PRC");
    if(!isset($_SESSION["username"])||!isset($_SESSION["islogined"])){
?>
        <!--<ul class="nav nav-tabs pull-right">-->
            <li>
                <a id="modal-813461" href="#modal-container-813461" role="button" class="btn" data-toggle="modal">登录</a>

                <div class="modal fade" id="modal-container-813461" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    登录
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form action="login.php" method="POST">
                                    <table class="table table-hover">
                                        <tr><td>用户名：</td><td><input name="username" type="text" placeholder="请在次输入用户名"></td></tr>
                                        <tr><td>密码：</td><td><input name="password" type="password" placeholder="请在次输入密码"></td></tr>
                                        <tr><td colspan="2" align="center"><input type="submit" value="登录" class="btn btn-sm btn-primary btn-block"></tr>
                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </li>

            <li>
                <a id="modal-534685" href="#modal-container-534685" role="button" class="btn" data-toggle="modal">注册</a>

                <div class="modal fade" id="modal-container-534685" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    注册
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form action="register.php" method="POST">
                                    <table class="table table-hover">
                                        <tr><td>用户名：</td><td><input name="username1" type="text" placeholder="请在次输入用户名"></td></tr>
                                        <tr><td>密码：</td><td><input name="password1" type="password" placeholder="请在次输入密码"></td></tr>
                                        <tr><td colspan="2" align="center"><input type="submit" value="注册" class="btn btn-sm btn-primary btn-block"></tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
<?php
    }else if(isset($_SESSION["Ground_id"])&&$_SESSION["Ground_id"]==1) {
            echo "<li><a class='btn' href='./admin.php'>敏感词管理</a></li>";
    }
    if($_SESSION){
            echo "<li><a class='btn' href='./loginout.php'>注销</a></li>";
    }
?>
        </ul>
    </div>