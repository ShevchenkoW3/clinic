<<<<<<< Updated upstream
<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
?>
<main>
<div class="container">
    <div class="row">
 <h2 class="name">О СПЕЦИАЛИСТАХ</h2>
 <section id="vrach">
    <div class="row">
        <div class="col-lg-12">
            <div class="row row-cols-1  row-cols-md-5 g-4">
                <?php
                $sql = "SELECT * FROM vrach, spec WHERE vrach.id_spec=spec.id_spec";
                $result = $mysqli->query($sql);
                foreach ($result as $row)  {
                    echo '<div class="col">
    <div class="card h-100">
      <img src="img/'.$row['img'].'" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">'.$row['fio_vrach'].'</h5>
        <p class="card-text">'.$row['name_spec'].'</p>
      </div>
    </div>
  </div>';
                }
                ?>
           </div>
        </div>
    </div>
</section>
</div>
</div>
</main>
=======
<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav_specialist.php';
?>
<main>
<div class="container">
    <div class="row">
 <h2 class="name">О СПЕЦИАЛИСТАХ</h2>
 <section id="vrach">
    <div class="row">
        <div class="col-lg-12">
            <div class="row row-cols-1  row-cols-md-5 g-4">
                <?php
                $sql = "SELECT * FROM vrach, spec WHERE vrach.id_spec=spec.id_spec";
                $result = $mysqli->query($sql);
                foreach ($result as $row)  {
                    echo '<div class="col">
    <div class="card h-100">
      <img src="img/'.$row['img'].'" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">'.$row['fio_vrach'].'</h5>
        <p class="card-text">'.$row['name_spec'].'</p>
      </div>
    </div>
  </div>';
                }
                ?>
           </div>
        </div>
    </div>
</section>
</div>
</div>
</main>
>>>>>>> Stashed changes
<?php include 'temp/footer.php';?>