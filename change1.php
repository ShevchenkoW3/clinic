<?php
include 'temp/database.php';
if(!empty($_GET['id_zapis'])){
    $id_zapis = $_GET['id_zapis'];
    $sql = "update zapis set status = 1 where id_zapis = $id_zapis";
    $result = $mysqli->query($sql);
}
?>