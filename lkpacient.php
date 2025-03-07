<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav_pacient.php';
session_start();
$id_user = $_SESSION['id_user'];
$id_role = $_SESSION['id_role'];
$sql = "SELECT * FROM zapis WHERE zapis.id_user = '$id_user'";
$result=$mysqli->query($sql);
?>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
          <br>
          <br>
          <br>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Врач</th>
      <th scope="col">Дата</th>
      <th scope="col">Время</th>
      <th scope="col">Статус</th>
      <th scope="col">Отзыв</th>
      <th scope="col">Ответ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?
    foreach($result as $row){
      $sql = "SELECT * FROM vrach, users, zapis WHERE zapis.id_vrach = vrach.id_vrach and vrach.id_user = users.id_user and users.id_role = 3";
      $result1=$mysqli->query($sql);
      $row1 = mysqli_fetch_assoc($result1);
      if ($row['status'] == 'Новая запись') {
        echo'
    <tr>
      <td>'.$row1['fio'].'</td>>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>';
      }
      elseif ($row['status'] == 'Завершено') {
        if(empty($row['otziv'])){
        echo'
    <tr>
      <td>'.$row1['fio'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td>'.$row['otziv'].'</td>
      <td>'.$row['otvet'].'</td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Оставить отзыв</button></td>
    </tr><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Оставить отзыв</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="addotziv.php"><div class="mb-3">
  <label for="otziv" class="form-label">Текст отзыва</label>
  <textarea class="form-control" id="otziv" name="otziv" rows="3"></textarea>
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
  </div>';}
    elseif(!empty($row['otziv'])){
      echo'
    <tr>
      <td>'.$row1['fio'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td>'.$row['otziv'].'</td>
      <td>'.$row['otvet'].'</td>
      <td></td>
    </tr>';
    }
      }
      else {
        echo'
    <tr>
      <td>'.$row1['fio'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>';
      }
    }?>
  </tbody>
</table>
        </div>
        <div class="col-2"></div>
    </div>
</div>