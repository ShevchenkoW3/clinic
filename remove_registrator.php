<?php
include 'temp/database.php';
$sql = "delete from zapis where id_zapis = $id_zapis";
$result = $mysqli->query($sql);
header('Location: registrator.php');
?>