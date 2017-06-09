<?php
include("header.php");
$username = isset($_POST["username1"])?$_POST["username1"]:"";
$password = isset($_POST["password1"])?$_POST["password1"]:"";
if ($username != "" && $password != ""){
    $groupID=0;//0为普通会员，1为管理员 
    $sqli ="SELECT * FROM user WHERE user_name=?";
    $res = prepare($sqli,array($username));
    if(count($res) !=0){
        //当用户名已注册
        echo "<script>alert('该用户名已被注册');location.href='index.php'</script>";
    }else{
        $sql = "INSERT INTO user (Ground_id,user_name,password)VALUES(?,?,?)";
        $data = array($groupID,$username,$password);
        $result = prepare($sql,$data);
        $_SESSION["username"]=$username;
        $_SESSION["Ground_id"]=0;
        $_SESSION["islogined"]="1";
        echo "<script>alert('歡迎你成為茶水間一員~快來灌水哇~');location.href='index.php';</script>";
    }
}else{
   echo "<script>alert('请至少输入用户名及密码');window.location.href=window.document.referrer</script>";
}
?>
</div>
</div>
</body>
</html>