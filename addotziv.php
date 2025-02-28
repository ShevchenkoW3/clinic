<?php
include 'temp/head.php';
include 'temp/database.php';
if (!empty($_POST)) {
    $id_zapis = $_POST['id_zapis'];
    $otziv = $_POST['otziv'];
    $sql = "UPDATE zapis SET otziv = '$otziv' WHERE id_zapis = '$id_zapis'";
    $result=$mysqli->query($sql);
    var_dump($sql);
    header("Location: lkpacient.php");
}
?>