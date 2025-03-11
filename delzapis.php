<?php
include 'temp/database.php';
session_start();
$id_user = $_SESSION['id_user'];
if (!empty($_GET['id_user'])) {
    $id_zapis = $_GET['id_zapis'];
    $sql = "DELETE FROM zapis WHERE id_zapis='$id_zapis'";
    $result=$mysqli->query($sql);
    header("Location: lkpacient.php");
}
?>