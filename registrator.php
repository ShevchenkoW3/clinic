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
$inject_sql .= " ORDER BY date_zapis DESC";
$sql = "select * from zapis, vrach, users where zapis.id_user = users.id_user and zapis.id_vrach = vrach.id_vrach" . $inject_sql;
$result = $mysqli->query($sql);
$otchet = $result->fetch_all(MYSQLI_ASSOC);
?>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Входящие записи на прием</h3><br>
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
                    <a href="registrator.php" role="button" class="btn btn-secondary">Очистить</a>
                </div>
            </form>
            </div>
        <div class="col-lg-1"></div>
        </div>
    <div class="row">
        <div class="col-lg-12" style="margin-top: 20px">
            <?php 
            if(!empty($d1) || !empty($d2)){
                echo '
                <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th>Дата записи</th>
                        <th>Врач</th>
                        <th>Пациент</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">';
                foreach($otchet as $row){
                    echo '
                            <tr>
                            <td>'.$row['date_zapis'].'</td>
                            <td>'.$row['fio_vrach'].'</td>
                            <td>'.$row['fio'].'</td>
                            <td>'.$row['status'].'</td>';
                            if($row['status'] == 'Новая запись'){
                                echo '<td><a href="change1.php?id_zapis='.$row['id_zapis'].'">Потвердить</a></td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id_zapis='.$row['id_zapis'].'>Отменить</button></td>';
                            }
                            elseif($row['status'] == 'Отменено'){
                                echo '<td><a href="remove.php?id_zapis='.$row['id_zapis'].'">Удалить</a></td>
                                <td></td>';
                            }
                            else{
                                echo '<td></td>
                                <td></td>';
                            }
                            echo '</tr>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Отмена записи</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="cancel.php" method="POST">
                                                <div class="mb-3">
                                                    <p>Вы уверены, что хотите отменить запись?<p>
                                                </div>
                                            <input type="hidden" class="form-control" name="id_zapis" value="'.$row['id_zapis'].'">
                                        </div>
                                        <div class="modal-footer">
                                           <button type="submit" class="btn btn-primary">Да</button> 
                                           <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
                                           </form>
                                        </div>
                                </div>
                            </div>
                        </div>';
                }
                echo '</tbody>
                </table>';
            }
            ?>
        </div>
    </div>
</div>