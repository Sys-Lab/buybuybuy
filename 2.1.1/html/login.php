<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/3/20
 * Time: 9:39
 */
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    if($name == ""){
        echo "1";  //用户名为空
        return;
    }
}else{
    echo "1 not Define User Name"; //没有传过来用户名
    return;
}


if (isset($_GET['ps'])) {
    $ps = $_GET['ps'];
    if($ps == ""){             //密码为空
        echo  "2";
        return;
    }
}else{
    echo "not Define Password";     //没有传过来密码
    return;
}
$conn = mysqli_connect("localhost", "root", "oracle", "database", "3306");
$q = "select userName,pass,user_id from users where userName = '".$_GET['name']."';";  //建立连接数据库，并查询
$r = mysqli_query($conn, $q);
$num = mysqli_num_rows($r);

if($num == 0){
    echo '3';
    return;
}
if($num == 1){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
//    echo $row['pass']."******".$_GET['ps'];
    if($row['pass'] == $_GET['ps']){
        setcookie('userName',$_GET['name']);
        setcookie('user_id',$row['user_id']);
        echo '4';
        return;
    }else{
        echo '5';
        return;
    }
}

