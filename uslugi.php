<?php
include 'temp/head.php';
include 'temp/nav_registrator.php';
include 'temp/database.php';
$sql = "select * from usluga";
$result = $mysqli->query($sql);
?>
<div class="container" class="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Услуги</h2>
            <a href="new_usluga.php" role="button" class="btn btn-primary">Добавить услугу</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12">
        <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th>№</th>
                        <th>Название услуги</th>
                        <th>Стоимость</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    if(!empty($result)){
                        foreach($result as $row){
                            $id_usluga = $row['id_usluga'];
                            $img = $row['img'];
                            $name_usl = $row['name_usl'];
                            $price = $row['price'];
                            echo '
                            <tr>
                            <td>'.$id_usluga.'</td>
                            <td>'.$name_usl.'</td>
                            <td>'.$price.'</td>
                            <td><a href="edit.php?id_usluga='.$id_usluga.'">Изменить</a></td>
                            </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>