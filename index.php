<?php include 'temp/head.php';
include 'temp/database.php';
session_start();
if(!empty($_SESSION)){
$id_role = $_SESSION['id_role'];
if($id_role == 2){
    include 'temp/nav_registrator.php';
}
elseif($id_role == 5){
    //Вывод навигации специалиста обработки данных
}
else{
    include 'temp/nav_pacient.php';
}
}
else{
    include 'temp/nav.php';
}
?>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="text-center">
                <h1></h1>
            </div>
        </div>
        <div class="col-2"></div>

    </div>
</div>
<?php include 'temp/footer.php';?>