<?php 
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
$d1 = $_GET['d1'] ?? '';
$d2 = $_GET['d2'] ?? '';
$inject_sql = '';
if($d1 !== ''){
    $inject_sql .= " AND date_zapis >= '$d1'";
}
if($d2 !== ''){
    $inject_sql .= " AND date_zapis <= '$d2'";
}
$sql = "select * from zapis, vrach, users where zapis.id_user = users.id_user and zapis.id_vrach = vrach.id_vrach" . $inject_sql;
$result = $mysqli->query($sql);
$registrator = $result->fetch_all(MYSQLI_ASSOC);
?>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Входящие записи на прием</h3><br>
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
        </div><br>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th>№</th>
                        <th>Врач</th>
                        <th>Пациент</th>
                        <th>Дата записи</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    if(!empty($registrator)){
                        foreach($registrator as $row){
                            $id_zapis = $row['id_zapis'];
                            $fio_vrach = $row['fio_vrach'];
                            $date_zapis = $row['date_zapis'];
                            $fio = $row['fio'];
                            $status = $row['status'];
                            echo '
                            <tr>
                            <td>'.$id_zapis.'</td>
                            <td>'.$fio_vrach.'</td>
                            <td>'.$fio.'</td>
                            <td>'.$date_zapis.'</td>
                            <td>'.$status.'</td>';
                            if($status == 'Новая'){
                                echo '<td><a href="change1.php?id_zapis='.$id_zapis.'">Потвердить</a></td>';
                            }
                            else{
                                echo '<td></td>';
                            }
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>