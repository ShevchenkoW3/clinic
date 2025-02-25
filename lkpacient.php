<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav_pacient.php';
session_start();
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM zapisi, vrach, usluga WHERE zapisi.id_user = '$id_user' AND zapisi.id_vrach = vrach.id_vrach AND zapisi.id_usluga = usluga.id_usluga";
$result=$mysqli->query($sql);
?>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Врач</th>
      <th scope="col">Услуга</th>
      <th scope="col">Дата</th>
      <th scope="col">Время</th>
      <th scope="col">Статус</th>
      <th scope="col">Ответ</th>
    </tr>
  </thead>
  <tbody>
    <?
    foreach($result as $row){
      if ($row['status'] == 'Новая') {
        echo'
    <tr>
      <td>'.$row['name_vrach'].'</td>
      <td>'.$row['name_usl'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td>'.$row['otvet'].'</td>
    </tr>';
      }
      elseif ($row['status'] == 'Завершенная') {
        echo'
    <tr>
      <td>'.$row['name_vrach'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td>'.$row['otvet'].'</td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Оставить отзыв</button></td>
    </tr><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Записаться на прием</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
  <div class="mb-3">
    <label for="date_zapis" class="form-label">Выберите дату</label>
    <input type="date" class="form-control" id="date_zapis" name="date_zapis" required>
  </div>
  <div class="mb-3">
    <label for="time_zapis" class="form-label">Выберите время</label>
    <input type="time" class="form-control" name="time_zapis" id="time_zapis" required>
    </div>
    <input type="hidden" name="id_zapis" value="'.$row['id_zapis'].'">
        <button type="submit" class="btn btn-primary">Отправить отзыв</button>
  </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
</div>
</form>
  </div>
    </tr>';
      }
    }?>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        </div>
        <div class="col-2"></div>
    </div>
</div>