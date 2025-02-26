<?php 
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
$sql = "select * from zapis, vrach, users where zapis.id_user = users.id_user and zapis.id_vrach = vrach.id_vrach and users.id_user = 4";
$result = $mysqli->query($sql);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Входящие записи на прием</h2><br>
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
                    if(!empty($result)){
                        foreach($result as $row){
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
                            <td>'.$date_zapis.'</td>';
                            if($status == 0){
                                echo '<td>Новое</td>
                                <td><a href="change1.php?id_zapis='.$id_zapis.'">Потвердить</a></td>';
                            }
                            else{
                                echo '<td>Записан</td>
                                <td></td>';
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