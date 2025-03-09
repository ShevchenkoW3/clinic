<?php
include 'temp/database.php';
if(!empty($_POST)){
        $id_usluga = $_POST['id_usluga'];
        $price = $_POST['price'];
        $sql = "update usluga set price = $price where id_usluga = $id_usluga";
        $result = $mysqli->query($sql);
        header("Location: uslugi.php");
}
