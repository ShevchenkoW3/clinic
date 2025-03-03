<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav_pacient.php';
session_start();
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM zapis WHERE id_user = '$id_user'";
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
      <th scope="col">Ответ</th>
    </tr>
  </thead>
  <tbody>
    <?
    foreach($result as $row){
      $sqll = "SELECT * FROM vrach WHERE id_vrach = ".$row['id_vrach']."";
      $result1=$mysqli->query($sqll);
      $row1 = mysqli_fetch_assoc($result1);
      if ($row['status'] == 'Новая') {
        echo'
    <tr>
      <td>'.$row1['fio_vrach'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
    </tr>';
      }
      elseif ($row['status'] == 'Оказано') {
        if(empty($row['otziv'])){
        echo'
    <tr>
      <td>'.$row1['fio_vrach'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
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
      <td>'.$row1['fio_vrach'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
      <td>'.$row['otvet'].'</td>
    </tr>';
    }
      }
      else {
        echo'
    <tr>
      <td>'.$row1['fio_vrach'].'</td>
      <td>'.$row['date_zapis'].'</td>
      <td>'.$row['time_zapis'].'</td>
      <td>'.$row['status'].'</td>
    </tr>';
      }
    }?>
  </tbody>
</table>
        </div>
        <div class="col-2"></div>
    </div>
</div>