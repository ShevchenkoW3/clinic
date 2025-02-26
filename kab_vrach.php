<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/navvrach.php';

if(!empty($_POST)) {
    $but = $_POST['but'];
    $sql = "UPDATE zapis SET status='Оказано' WHERE id_zapis=('$but')";
    $result=$mysqli->query($sql);
    header('location: kab_vrach.php');
}

$d1 = $_GET['d1'] ?? '';
$d2 = $_GET['d2'] ?? '';
$inject_sql = '';
if($d1 !== ''){
    $inject_sql .= " AND date_zapis >= '$d1'";
}
if($d2 !== ''){
    $inject_sql .= " AND date_zapis <= '$d2'";
}
$sql = "SELECT * FROM zapis, vrach, users, usluga 
WHERE zapis.id_vrach = vrach.id_vrach 
AND zapis.id_user = users.id_user
AND vrach.id_usluga = usluga.id_usluga" . $inject_sql;
$result = $mysqli->query($sql);
$zapiss = $result->fetch_all(MYSQLI_ASSOC);
?>
<main>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Записавшиеся на прием пациенты</h3><br>
        </div>
            <div class="col-lg-2">
            <form class="form-inline" action="" method="GET">
                <div class="mb-3">
                    <label for="d1" class="form-label">C</label>
                    <input type="date" class="form-control" name="d1" <?= $d1 ?>>
                </div>
                <div class="mb-3">
                    <label for="d2" class="form-label">По</label>
                    <input type="date" class="form-control" name="d2" <?= $d2 ?>>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Просмотреть</button>
                </div>
            </form>
        </div>
            <div class="col-lg-10">
                <table border="1" class="table">
                    <tr class="table-primary">
                        <th>ФИО пациента</th>
                        <th>Наименование услуги</th>
                        <th>Дата записи</th>
                        <th>Цена услуги</th>
                        <th colspan="2">Статус</th>
                    </tr>
                    <?php foreach ($zapiss as $zapis) { ?>
                        <tr>
                        <td><?= $zapis['fio']?></td> 
                        <td><?= $zapis['name_usl']?></td>
                        <td><?= $zapis['date_zapis']?></td>
                        <td><?= $zapis['price']?> Руб.</td>
                        <td><?= $zapis['status']?></td>
                       <?php 
          if($zapis['status'] == 'Новая'){
            echo'<td><form action="" method="POST"><button type="submit" class="btn btn-primary" name="but" value="'.$zapis['id_zapis'].'">Подтвердить</button></form></td></tr>';
            }?>
 <?php }?>
                </table>
            </div>
        </div>
    </div>
</main>
