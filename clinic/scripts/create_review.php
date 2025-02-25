<?php 
include '../temp/database.php';
$otziv = $_POST['otziv'];
$id_zapis = $_POST['id_zapis'];
$sql = "UPDATE zapis SET otvet = '$otziv' WHERE zapis.id_zapis = $id_zapis ";
$mysqli->query($sql);
header("location:../reviews.php")
?>