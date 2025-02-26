<?php
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
$d1 = '2025-01-01';
$d2 = '9999-01-01';
$total = 0;
$sql = "select fio, count(id_zapis) from zapis, users where users.id_user = zapis.id_user and users.id_user = 4 group by fio";
$result = $mysqli->query($sql);
?>
<div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Отчеты о пациентах</h2>
                <table class="table">
                    <thead>
                        <tr class="table-primary">
                            <th>Пациент</th>
                            <th>Количество посещений врачей</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php 
                        if(!empty($result)){
                            foreach($result as $row){
                                $fio = $row['fio'];
                                $zapis = $row['count(id_zapis)'];
                                $total += $zapis;
                                echo '
                                <tr>
                                <td>'.$fio.'</td>
                                <td>'.$zapis.'</td>
                                </tr>';
                            }
                            echo '<tr><td colspan=1><b></b>Всего:</td><td>'.$total.'</td></td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
