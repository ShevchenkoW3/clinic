<?php
include 'temp/database.php';
if(!empty($_POST)){
    $id_zapis = $_POST['id_zapis'];
    $sql = "update zapis set status = 'Отменено' where id_zapis = $id_zapis";
    $result = $mysqli->query($sql);
    header("Location: registrator.php");
}
?>