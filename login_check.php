<?php 
include 'temp/database.php';
if(!empty($_POST)){
    $login = $_POST['login'];
    $sql = "select * from users where login = '$login'";
    $result = $mysqli->query($sql);
    $user = mysqli_fetch_assoc($result);
    if(!empty($user)){
        echo 'Пользователь с таким логином существует';
    }
    else{
        echo '';
    }
}
