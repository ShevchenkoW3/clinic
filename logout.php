<?php 
session_start();
$_SESSION['id_user'] = $userdata['id_user'];
$_SESSION['id_role'] = $userdata['id_role'];
unset($_SESSION['id_user']);
unset($_SESSION['id_role']);
header("Location: index.php");
?>