<?php session_start()?>
<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
?>
<?php 
$sql = "SELECT * FROM zapis, vrach, users, usluga WHERE 
zapis.id_vrach = vrach.id_vrach 
AND zapis.id_user = users.id_user
AND vrach.id_usluga = usluga.id_usluga
AND otziv IS NOT NULL ORDER BY id_zapis DESC";
$result = $mysqli->query($sql);
$zapiss = $result->fetch_all(MYSQLI_ASSOC)


// print "<pre>";
// print_r($vrachi);
 ?>
<main>
<div class="container">
    <div class="row">
 <h2 class="name">Отзывы</h2>
 <section id="vrach">
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary mb-4" href="/datamanager.php">Перейти в панель обработки данных</a>
            <table class="table table-striped">
					<thead>
                    <tr>
                    <th scope="col">Ф.И.О. пациента</th>
                    <th scope="col">Наименование услуги</th>
                    <th scope="col">Дата  приёма</th>
                    <th scope="col">Отзыв</th>
                    <th scope="col">Ответ</th>
                    <th scope="col">Ответить</th>
                    </tr>
                </thead>
                <tbody>
                
                            <?php foreach ($zapiss as $zapis) { ?>
                                

                <tr>
                <td><?= $zapis['fio']?></td> 
                <td><?= $zapis['name_usl']?></td>
                <td><?= $zapis['date_zapis']?></td>
                <td><?= $zapis['otziv']?></td>
                <td><?= $zapis['otvet']?></td>
                <td>
                    <?php if (empty($zapis['otvet'])) {?>
                    <a href="/new_review.php?id_zapis=<?= $zapis['id_zapis'] ?>" class="btn btn-primary">Ответить</a>
                    <?php }?>
                </td>
                </tr>
                <?php }?>
                </tbody>
                </table>

        </div>
    </div>
</section>
</div>
</div>
</main>
