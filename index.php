<?php 
include 'temp/head.php';
include 'temp/database.php';
session_start();
if(!empty($_SESSION['id_role'])){
    if($_SESSION['id_role'] == 2){
        include 'temp/nav_registrator.php';
    }
    elseif($_SESSION['id_role'] == 3){
        include 'temp/nav_vrach.php';
    }
    elseif($_SESSION['id_role'] == 4){
        include 'temp/nav_pacient.php';
    }
    else{
        include 'temp/nav_specialist.php';
        }
    }
else{
    include 'temp/nav.php';
}
?>
    <main>
<div class="container">
    <section id="banner">
    <div id="carouselExampleDark" class="carousel carousel-white slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleWhite" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleWhite" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleWhite" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/123.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/баннер2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h1 style="color:rgb(2,36,63)">ГИБКАЯ СИСТЕМА СКИДОК!</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/баннер3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h1>ИНДИВИДУАЛЬНЫЙ ПОДХОД ДЛЯ КАЖДОГО ПАЦИЕНТА!</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
    <div class="row">
</section>
<h2 style="text-align:center; margin:20px 0px">УСЛУГИ ЧАСТНОЙ ПОЛИКЛИНИКИ</h2>
<section id="price">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="row row-cols-1  row-cols-md-6 g-4">
                <?php
                $sql = "SELECT * FROM usluga";
                $result = $mysqli->query($sql);
                foreach ($result as $row)  {
                    echo '<div class="col">
      <div class="card h-100">
      <div class="card">
         <img src="img/'.$row['img'].'" class="card-img-top" alt="...">
         </div>
      <div class="card-body">
         <p class="card-title"style="color:rgb(2,36,63)"><b>'.$row['name_usl'].'</b></p>
         <p class="card-text"style="color:rgb(2,36,63)">'.$row['price'].'Руб.</p> 
      </div>
    </div>
  </div>';
                }
                ?>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</section>
<h2 style="text-align:center; margin:20px 0px">О КЛИНИКЕ</h2>
<section id="price">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="row row-cols-1  row-cols-md-3 g-3">
                <img src="img/2.png" class="img-same-size" alt="...">
                <img src="img/3.png" class="img-same-size" alt="...">
                <img src="img/4.png" class="img-same-size" alt="...">
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div><br>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="row row-cols-1  row-cols-md-3 g-3">
                <img src="img/5.png" class="img-same-size" alt="...">
                <img src="img/6.png" class="img-same-size" alt="...">
                <img src="img/7.jpg" class="img-same-size" alt="...">
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>
</main>

    </div>
</div>
<?php include 'temp/footer.php';?>