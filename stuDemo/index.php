<html>
<head  >
    <title>学生信息管理</title>
</head>
<script>
    function  doDel(id) {
        if (confirm("确定要删除吗？")){
            window.location='action.php?action=del&id='+id;
        }
    }
</script>
<body>
<center>
    <?php include ('menu.php');?>
    <h3>浏览学生信息</h3>
    <table width="600" border="1">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>班级</th>
        <th>操作</th>
    </tr>
        <?php
        //1.连接数据库
        try{
            $pdo=new  PDO("mysql:host=localhost;dbname=stu",
                "root", "africa5500");
        }catch (PDOException $e){
            die("数据库连接失败".$e->getMessage());
        }
        //2.执行sql查询
        $sql="select * from student";
        foreach ($pdo->query($sql) as $val){
            echo "<tr>";
            echo "<td>{$val['id']}</td>";
            echo "<td>{$val['name']}</td>";
            echo "<td>{$val['sex']}</td>";
            echo "<td>{$val['age']}</td>";
            echo "<td>{$val['classid']}</td>";
            echo "<td>
            <a href='javascript:doDel({$val['id']})'>删除</a> 
            <a href='edit.php?id=({$val['id']})'>修改</a>
                </td>";
            
            echo "<tr>";

        }
        ?>
    </table>
</center>
</body>
</html>