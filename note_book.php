<style>
    .board td {
        max-width: 450px;
    }
</style>
<?php
    // require_once("pdo.php");
    include("./header.php");
    $G_id = isset($_SESSION["Ground_id"])?$_SESSION["Ground_id"]:"";
    $use_name = isset($_SESSION['username'])?$_SESSION['username']:"";
    $sql = 'SELECT * FROM note';
    $res = prepare($sql);
    if($_GET){
        $page_num = $_GET['page_num']?$_GET['page_num']:1;
    }else{
        $page_num = 1;
    }
    $count = count($res);
    $page_rows = 5;
    $page_count  = ceil($count/$page_rows);  //计算得出总页数
    $startCount=($page_num-1)*$page_rows; //分页开始,根据此方法计算出开始的记录
    $limit = $startCount+$page_rows;
    if($limit<$count){
        $num = $limit;
    }else{
        $num = $count;
    }
    for($i = $startCount;$i<$num;$i++){
        //读取留言信息
        $user = $res[$i]['note_id'];
        $title = $res[$i]['note_title'];
        $author = $res[$i]['note_user'];
        $note_content = $res[$i]['note_content'];
        $datetime = $res[$i]['note_time'];
        $user_name = $res[$i]['user_name'];
        $note_flag = $res[$i]['note_flag'];
        $note_answer = $res[$i]['note_answer'];
        echo "<div class='board' id='table";
        echo $user."'><table>";
        if($note_flag ==0){
            //悄悄话输出
            if($use_name==$user_name&&$use_name !=""){
                //本人界面
                echo "<tr><td colspan='2' align='center'>我的悄悄话~</td></tr>";            
                echo "<tr><td>标题：</td><td>".$title."</td></tr>";
                echo "<tr><td>内容：</td><td>".$note_content."</td></tr>";
                echo "<tr><td>时间：</td><td>".$datetime."</td></tr>";
            }else if($G_id==1){
                // 管理员界面
                echo "<tr><td colspan='2' align='center'>悄悄话~</td></tr>";
                echo "<tr><td>标题：</td><td>".$title."</td></tr>";
                echo "<tr><td>内容：</td><td>".$note_content."</td></tr>";
                echo "<tr><td>时间：</td><td>".$datetime."</td></tr>";                       
            }else{
                //其他用户界面
                echo "<tr><td colspan='2' align='center'>给版主的悄悄话~</td></tr>";
            }
        }else{
            //普通留言
            echo "<tr><td>姓名：</td><td>".$author."</td></tr>";
            echo "<tr><td>标题：</td><td>".$title."</td></tr>";
            echo "<tr><td>内容：</td><td>".$note_content."</td></tr>";
            echo "<tr><td>时间：</td><td>".$datetime."</td></tr>";
        }
        if($note_answer ==1&&($use_name==$user_name||$G_id==1)){
            //已回复状态下，管理员或本人对悄悄话回复的查看权限
            $sql = 'SELECT * FROM note_answer WHERE noan_note_id=?';
            $result = prepare($sql,array($user));
             echo "<tr><td>
            <div class='alert alert-success alert-dismissable'>
				 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
				<h5>
					回复:
				</h5>";
                // print_r($result);
                echo $result[0]['noan_content']."<br>时间：";
                echo $result[0]['noan_time'];
			echo"</div></td></tr>";
        }else{
            //未回复状态
            if($G_id==1){
                // 管理员回复框
?>
<tr><td align="center">
               <div class="btn-group">
				 <button class="btn btn-default btn-primary" data-toggle="collapse" data-parent="#accordion"
				   href="#collapse<?php echo $i;?>">回复</button>
                 <ul id="collapse<?php echo $i;?>" class="panel-collapse collapse">
					<li style='list-style:none;'>
                    <form action="note_answer.php?num=<?php echo $user;?>&author=<?php echo $author;?>" method="POST">
                        <table>
                            <tr><td>内容：</td><td><textarea name="content" cols="45" rows="8" style="background:url(./images/msg.jpg) center no-repeat #fff;background-size:contain;"></textarea></td></tr>
                            <tr><td colspan="2" align="center"><input type="submit" value="回复(*^_^*)"></td></tr>
                        </table>
                    </form>
				</ul>
			</div>
        </td>
        
<?php
            }
        }
        if($G_id==1){
            // 管理员的删除权限
?>
        <td align='center'>
            <button type='button' class='delete btn btn-default btn-danger' id="<?php echo $user;?>">删除</button>
        </td>
<script>
// ajax发送post请求删除留言
    $('.delete').click(function(){
        var url = './note_answer.php';
        var del = $(this).attr('id');//获得id
        	$.ajax({
			type : "POST",
            url : url,
            async:true,
            dataType:'html',
            data: {
				delete: del,
			},
            error:function(){
				alert("删除失败，不如跳舞~");
			},
            success:function(){
				$('#table'+del).remove();//删除成功，删除模块
                }    
        });
    })
</script>
<?php
        }
            echo "</tr></table></div>";             
    }
    echo "<div class='center'>
                    <ul >";
                        if ($page_num!= 1) { //页数不等于1
                            $before = $page_num- 1;
                            echo "<li><a href='note_book.php?page_num=1'>首</a></li> 
                            <li><a href='note_book.php?page_num=".$before."'>上</a></li>
                            ";
                        }
                        for ($i=1;$i<=$page_count;$i++) {  //循环显示出页面
                            if($page_num== $i){
                                echo "
                            <li class='action'><a href='note_book.php?page_num=".$i."'>".$i."</a></li>
                            ";
                            }else{
                             echo "
                            <li><a href='note_book.php?page_num=".$i."'>".$i."</a></li>
                            ";
                            }
                        }
                        if ($page_num!= $page_count){
                            $next = $page_num+ 1;
                            echo "<li><a href='note_book.php?page_num=".$next."'>下</a></li>
                            <li><a href='note_book.php?page_num=".$page_count."'>尾</a></li>";
                        }
                        echo "</ul></div>";
?>