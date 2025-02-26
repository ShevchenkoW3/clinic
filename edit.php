<?php
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
if(!empty($_GET['id_usluga'])){
if(!empty($_POST)){
        $id_usluga = $_GET['id_usluga'];
        $price = $_POST['price'];
        $sql = "update usluga set price = $price where id_usluga = $id_usluga";
        $result = $mysqli->query($sql);
        header("Location: uslugi.php");
}
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <form action="" class="form-inline" role="form" method="POST">
        <div class="mb-3">
        <label for="price" class="form-inline">Введите новую цену</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Изменить">
        </div>
</form>      
        </div>
    </div>
</div>
