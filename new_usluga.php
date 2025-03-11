<?php
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
if(!empty($_POST)){
        $name_usl = $_POST['name_usl'];
        $price = $_POST['price'];
        $sql = "insert into usluga (name_usl, price) values ('$name_usl', $price)";
        $result = $mysqli->query($sql);
        header("Location: uslugi.php");
}
?>
