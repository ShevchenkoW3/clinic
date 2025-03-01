<?php
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
$total = 0;
$d1 = $_GET['d1'] ?? '';
$d2 = $_GET['d2'] ?? '';
$inject_sql = '';
if($d1 !== ''){
    $inject_sql .= " AND date_zapis >= '$d1'";
}
if($d2 !== ''){
    $inject_sql .= " AND date_zapis <= '$d2'";
}
$inject_sql .= " GROUP BY fio";
$sql = "select fio, count(id_zapis) from zapis, users where users.id_user = zapis.id_user" . $inject_sql;
$result = $mysqli->query($sql);
$otchet = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
        <h2 class="text-center">Отчеты о пациентах</h2><br>
        </div>
        <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <form class="form-inline" action="" method="GET">
                <div class="col-2" style="display: inline-block">
                    <label for="d1" class="form-label">C</label>
                    <input type="date" class="form-control" name="d1" <?= $d1 ?>>
                </div>
                <div class="col-2" style="display: inline-block">
                    <label for="d2" class="form-label">По</label>
                    <input type="date" class="form-control" name="d2" <?= $d2 ?>>
                </div>
                <div class="col-6" style="display: inline-block">
                    <button type="submit" class="btn btn-primary">Просмотреть</button>
                    <a href="otchet_registrator.php" role="button" class="btn btn-secondary">Очистить</a>
                </div>
            </form>
            </div>
        <div class="col-lg-1"></div>
        <div class="row">
            <div class="col-lg-12" style="margin-top: 20px">
                    <?php 
            if(!empty($d1) || !empty($d2)){
                echo '
                <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th>Пациент</th>
                        <th>Количество посещений</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">';
                foreach($otchet as $row){
                    $total += $row['count(id_zapis)'];
                    echo '
                    <tr>
                    <td>'.$row['fio'].'</td>
                    <td>'.$row['count(id_zapis)'].'</td>
                    </tr>';
                }
                echo '<tr><td colspan=1><b></b>Всего:</td><td>'.$total.'</td></td></tr>
                    </tbody>
                </table>';
            }
            ?>
            </div>
        </div>
    </div>
</div>
