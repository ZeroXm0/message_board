<?php
include("./header.php");
?>
    <div class="board">
        <form action="note_check.php" method="POST">
            <table>
                <tr><th colspan="2">我要留言</th></tr>
                <tr><td>姓名：</td><td><input name="user_name" type="text" value="匿名" maxlength="64"></td></tr>
                <tr><td>标题：</td><td><input name="title" type="text" maxlength="64" size="30"></td></tr>
                <tr><td>内容：</td><td><textarea name="content" cols="60" rows="8" style="background:url(./images/msg.jpg) center no-repeat #fff;background-size:contain;"></textarea></td></tr>
                <!--<tr><td>你现在的心情：</td><td></td></tr>-->
                <tr><td><input name="checkbox" type="radio" value='1' checked="checked">留言</td><td><input name="checkbox" type="radio" value='0'>悄悄话</td></tr>
                <tr><td colspan="2" align="center"><input type="submit" value="签写留言"></td></tr>
            </table>
        </form>
    </div>
</body>
</html>