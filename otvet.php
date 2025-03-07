<?php 
include 'temp/head.php';
include 'temp/nav_specialist.php';
include 'temp/database.php';
if(!empty($_GET['id_zapis'])){
    $id_zapis = $_GET['id_zapis'];
    if(!empty($_POST)){
        $otvet = $_POST['otvet'];
        $sql = "update zapis set otvet = '$otvet' where id_zapis = '$id_zapis'";
        $result = $mysqli->query($sql);
        header("Location: reviews.php");
    }
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="otvet" class="from-label">Введите ответ</label>
                    <textarea name="otvet" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Продолжить">
                </div>
            </form>
        </div>
    </div>
</div>