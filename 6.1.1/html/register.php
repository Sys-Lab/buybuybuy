<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/3/20
 * Time: 9:56
 */
//header("Content-type: text/php; charset=utf-8");
if($_GET['name'] == ''){
    echo '1';
    return;
}
if($_GET['email'] == ''){
    echo '3';
    return;
}

if($_GET['pass'] == ''){
    echo '4';
    return;
}
if($_GET['enpass'] == ''){
    echo '5';
    return;
}
if($_GET['securityProblem'] == ''){
    echo '6';
    return;
}
if($_GET['answer'] == ''){
    echo '7';
    return;
}
$conn = mysqli_connect("localhost", "root", "oracle", "database", "3306");
$q = "select userName from users where userName='".$_GET['name']."';";  //建立连接数据库，并查询
$r = mysqli_query($conn,$q);
$num = mysqli_num_rows($r);
$num = mysqli_num_rows($r);
if($num != 0){
    echo '9';
    return;
}else{

    if($_GET['pass'] != $_GET['enpass']){
        echo '10';
        return;
    }

    $q = "insert into users(userName,sex,email,birthday,pass,securityProblem,answer) VALUES ('{$_GET['name']}','{$_GET['sex']}','{$_GET['email']}','{$_GET['birthday']}','{$_GET['pass']}','{$_GET['securityProblem']}','{$_GET['answer']}');";

    $r = mysqli_query($conn,$q);

    if($r){
        setcookie('userName',$_GET['name']);

        echo '11';

    }
}

mysqli_close($conn);
//localhost/mai/php/register.php?name=yulang&sex=man&enpass=123&email=123&birthday=1994-9-1&pass=1234&securityProblem=ni shi hao ren ma&answer=shida