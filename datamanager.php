<?php session_start()?>
<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
?>
<?php 
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';
$inject_sql = '';
if($date_from !== ''){
    $inject_sql .= " AND date_zapis >= '$date_from'";
}
if($date_to !== ''){
    $inject_sql .= " AND date_zapis <= '$date_to'";
}
$sql = "SELECT * FROM zapis, vrach, users, usluga WHERE 
zapis.id_vrach = vrach.id_vrach 
AND zapis.id_user = users.id_user
AND vrach.id_usluga = usluga.id_usluga" . $inject_sql;
$result = $mysqli->query($sql);
$zapiss = $result->fetch_all(MYSQLI_ASSOC);


$date_from_vrach = $_GET['date_from_vrach'] ?? '';
$date_to_vrach = $_GET['date_to_vrach'] ?? '';
$inject_sql = '';
if($date_from_vrach !== ''){
    $inject_sql .= " AND date_zapis >= '$date_from_vrach'";
}
if($date_to_vrach !== ''){
    $inject_sql .= " AND date_zapis <= '$date_to_vrach'";
}
$sql = "SELECT users.fio, usluga.name_usl, usluga.price, count(zapis.id_zapis) As zapis_count,
 count(zapis.otziv) As otziv_count FROM vrach, usluga, zapis, users
 WHERE vrach.id_usluga = usluga.id_usluga 
 AND vrach.id_user = users.id_user
 AND vrach.id_vrach = zapis.id_vrach $inject_sql
GROUP BY zapis.id_vrach;";
$result = $mysqli->query($sql);
$vrachi = $result->fetch_all(MYSQLI_ASSOC);


// print "<pre>";
// print_r($vrachi);
 ?>
<main>
    <div class="container">
        <div class="row">
            <h2 class="name">Панель специалиста отдела обработки данных</h2>
            <section id="vrach">
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-primary mb-4" href="/reviews.php">Перейти в панель отзывов</a>
        <h2>Отчёт о работе врача за период </h2>
                            <form action="" method="get" class="row g-3 align-items-center" >
                                <div class="col-2">
                                    <label for="date_from" class="form-label">От</label>
                                    <input type="date" name="date_from" value="<?= $date_from ?>" class="form-control"
                                        id="date_from">
                                </div>
                                <div class="col-2">
                                    <label for="date_to" class="form-label">До</label>
                                    <input type="date" name="date_to" value="<?= $date_to ?>" class="form-control"
                                        id="date_to">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary">Применить</button>
                                </div>
                                <div class="col-2">
                                    <a href="/datamanager.php" class="btn btn-secondary">Очистить фильтр</a>
                                </div>
                           
            
                        
<?php if(!empty($date_from) || !empty($date_to)){ ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Ф.И.О. пациента</th>
                                    <th scope="col">Наименование услуги</th>
                                    <th scope="col">Дата приёма</th>
                                    <th scope="col">Цена</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($zapiss as $zapis) { ?>

                                <tr>
                                    <td><?= $zapis['fio']?></td>
                                    <td><?= $zapis['name_usl']?></td>
                                    <td><?= $zapis['date_zapis']?></td>
                                    <td><?= $zapis['price']?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
<?php } else { ?>
    <pre>
        Выберите временной промежуток
    </pre>
    <?php } ?>
    <h2>Отчёт о работе специалистов за период  </h2>
                        <form action="" method="get" class="row g-3 align-items-center">
                            <div class="col-2">
                                <label for="date_from_vrach" class="form-label">От</label>
                                <input type="date" name="date_from_vrach" value="<?= $date_from_vrach ?>"
                                    class="form-control" id="date_from_vrach">
                            </div>
                            <div class="col-2">
                                <label for="date_to_vrach" class="form-label">До</label>
                                <input type="date" name="date_to_vrach" value="<?= $date_to_vrach ?>"
                                    class="form-control" id="date_to_vrach">
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-primary">Применить</button>
                            </div>
                            <div class="col-2">
                                <a href="/datamanager.php" class="btn btn-secondary">Очистить фильтр</a>
                            </div>
                        </form>
                        <?php if(!empty($date_from_vrach) || !empty($date_to_vrach)){ ?>
                        <table class="table table-striped">
                            
                            <thead>
                                <tr>
                                    <th scope="col">Ф.И.О специалиста </th>
                                    <th scope="col">Наименование услуги</th>
                                    <th scope="col">Цена услуги</th>
                                    <th scope="col">Кол-во оказанных услуг</th>
                                    <th scope="col">Кол-во отзывов</th>
                                    <th scope="col">Рейтинг</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($vrachi as $vrach) { ?>

                                <tr>
                                    <td><?= $vrach['fio']?></td>
                                    <td><?= $vrach['name_usl']?></td>
                                    <td><?= $vrach['price']?></td>
                                    <td><?= $vrach['zapis_count']?></td>
                                    <td><?= $vrach['otziv_count']?></td>
                                    <td><?= round($vrach['otziv_count']/$vrach['zapis_count'], 2) ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <?php } else { ?>
    <pre>
        Выберите временной промежуток
    </pre>
    <?php } ?>
    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>