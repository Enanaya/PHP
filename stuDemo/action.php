<?php
/**
 * Created by PhpStorm.
 * User: 76500
 * Date: 2018/2/3
 * Time: 18:09
 */
//连接数据库
try{
    $pdo=new  PDO("mysql:host=localhost;dbname=stu",
        "root", "africa5500");
}catch (PDOException $e){
    die("数据库连接失败".$e->getMessage());
}
//2通过action的值做对应操作





switch ($_GET['action']){
    case  "add": //增加操作
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $age=$_POST['age'];
        $classid=$_POST['classid'];
    $sql="insert into student VALUES (null,'{$name}',
'{$sex}','{$age}','{$classid}')";
    $rw=$pdo->exec($sql);
    if ($rw>0){
        echo "<script>alert('增加成功');
        window.location='index.php'</script>";
    }else{
        echo "<script>alert('增加失败');
        window.location='index.php'</script>";
    }
    break;

    case  "del": //删除操作
        $id=$_GET['id'];
        $sql="delete from student where id=$id";
        $pdo->exec($sql);
        header("Location:index.php");
        break;

    case "edit":
        //1.获取表单信息
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $age=$_POST['age'];
        $classid=$_POST['classid'];
        $id=$_POST['id'];
        $sql="update  student set name='{$name}',sex='{$sex}',age={$age}
        ,classid={$classid} where id={$id}";
        $rw=$pdo->exec($sql);
        if ($rw>0){
            echo "<script>alert('修改成功');
        window.location='index.php'</script>";
        }else{
            echo "<script>alert('修改失败');
        window.location='index.php'</script>";
        }
        break;

}