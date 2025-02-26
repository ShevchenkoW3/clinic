<?php
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
if(!empty($_POST)){
        $name_usl = $_POST['name_usl'];
        $price = $_POST['price'];
        $sql = "insert into usluga (name_usl, price) values ('$name_usl', $price)";
        $result = $mysqli->query($sql);
        header("Location: uslugi.php");
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <form action="" class="form-inline" role="form" method="POST">
        <div class="mb-3">
            <label for="name_usl" class="form-inline">Введите новую услугу</label>
            <input type="text" class="form-control" name="name_usl">
        </div>
        <div class="mb-3">
            <label for="price" class="form-inline">Введите цену</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Добавить">
        </div>
</form>      
        </div>
    </div>
</div>
