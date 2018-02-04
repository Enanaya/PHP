<html>
<head><title>学生管理信息</title></head>
<body>
<center>
    <?php include ("menu.php");
    try{
        $pdo=new  PDO("mysql:host=localhost;dbname=stu",
            "root", "africa5500");
    }catch (PDOException $e){
        die("数据库连接失败".$e->getMessage());
    }

    //2拼sql语句找出信息

    $sql="select * from student WHERE id={$_GET['id']}";
    $stmt= $pdo->query($sql);
    $b=6;
    if ($stmt->rowCount()>0){
        $stu=$stmt->fetch(PDO::FETCH_ASSOC);
        print_r($stu);
    }
    else{
        die("没有要修改的信息");
    }
    ?>
    <h3>
        修改学生信息
    </h3>
    <form action="action.php?action=edit" method="post">
        <input type="hidden" name="id" value="<?php echo $stu['id']; ?>"/>
        <table>
            <tr>
                <td>姓名</td>
                <td>
                    <input type="text" name="name" value="
                    <?php echo $stu['name']; ?>"/>
                </td>
            </tr>

            <tr>
                <td>性别</td>
                <td>
                    <input type="radio" name="sex" value="M"
                        <?php echo ($stu['sex']=="M")?"checked":""?>/> 男
                    <input type="radio" name="sex" value="W"
                        <?php echo ($stu['sex']=="W")?"checked":""?> /> 女
                </td>
            </tr>

            <tr>
                <td>年龄</td>
                <td><input type="text" name="age"
                    value="<?php echo $stu['age'];?>"></td>
            </tr>

            <tr>
                <td>班级</td>
                <td><input type="text" name="classid"
                    value=" <?php echo $stu['classid'];?>"></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="修改">
                    <input type="reset" name="重置"></td>

            </tr>
        </table>
    </form>
</center>
</body>
</html>