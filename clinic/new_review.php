<?php session_start()?>
<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
?>
<?php 
$id = $_GET['id_zapis'];
$sql = "SELECT * FROM zapis, vrach, users, usluga WHERE 
zapis.id_vrach = vrach.id_vrach 
AND zapis.id_user = users.id_user
AND vrach.id_usluga = usluga.id_usluga
AND otziv IS NOT NULL 
AND id_zapis = $id
ORDER BY id_zapis DESC";
$result = $mysqli->query($sql);
if(!$result){
        header('location: ./reviews.php');
        exit;
}
$zapis = $result->fetch_assoc()


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
                    </tr>
                </thead>
                <tbody>                                
                <tr>
                <td><?= $zapis['fio']?></td> 
                <td><?= $zapis['name_usl']?></td>
                <td><?= $zapis['date_zapis']?></td>
                <td><?= $zapis['otziv']?></td>
                </tr>
                </tbody>
                </table>

                <form action="/scripts/create_review.php" method="post">
                    <input type="hidden" name="id_zapis" value="<?= $zapis['id_zapis'] ?>">
                    <div class="mb-3">
                        <label for="xxxx" class="form-label">Текст отзыва</label>
                        <textarea name="otziv" class="form-control" id="xxxx" rows="3"></textarea>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Отправить</button>
                    </div>
                </form>
        </div>


    </div>
</section>
</div>
</div>
</main>
