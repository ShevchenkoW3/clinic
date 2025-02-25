<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
session_start();
$id_user = $_SESSION['id_user'];
$message = '';
if (!empty($_POST)) {
    $date_zapis = $_POST['date_zapis'];
    $time_zapis = $_POST['time_zapis'];
    $id_vrach = $_POST['id_vrach'];
    $sql = "INSERT INTO zapis(id_user, date_zapis, time_zapis, id_vrach) VALUES ('$id_user','$date_zapis','$time_zapis','$id_vrach')";
    $result=$mysqli->query($sql);
    var_dump($sql);
    header("Location: lkpacient.php");
}
?>