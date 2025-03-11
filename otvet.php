<?php 
include 'temp/database.php';
    if(!empty($_POST)){
        $id_zapis = $_POST['id_zapis'];
        $otvet = $_POST['otvet'];
        $sql = "update zapis set otvet = '$otvet' where id_zapis = '$id_zapis'";
        $result = $mysqli->query($sql);
        header("Location: reviews.php");
    }
?>