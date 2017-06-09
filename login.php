<?php
include("header.php");
$username=isset($_POST["username"])?$_POST["username"]:"";
$passwords=isset($_POST["password"])?$_POST["password"]:"";
if ($username != "" && $passwords != ""){
    $sql = "SELECT password,Ground_id FROM user WHERE user_name=?";
    $res = prepare($sql,array($username));
    if(count($res) > 0){
        //如果用户存在，则检查密码是否正确
        $password = $res[0]['password'];
        $groupID = $res[0]['Ground_id'];
            if($password != $passwords){
                echo"<script>alert('密码不正确哦~');window.location.href=window.document.referrer;</script>";
            }else{
                //用户名、密码都正确
                $_SESSION["username"]=$username;
                $_SESSION["Ground_id"]=$groupID;
                $_SESSION["islogined"]="1";
                echo"<script>window.location.href=window.document.referrer;</script>";
                }
        }else{
                //如果没有这个用户
                echo"<script>alert('该用户不存在哦~');window.location.href=window.document.referrer;</script>";
            }
    }else{
        echo"<script>alert('请输入用户名和密码~');window.location.href=window.document.referrer;</script>";
    }
?>
</div>
</div>
</body>
</html>