
<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav_pacient.php';
?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <br>
            <br>
            <br>
            <div class="text-center"><h3>Запись на прием</h3></div>
            
            <br>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ФИО врача</th>
      <th scope="col">Специальность врача</th>
      <th scope="col">Наименование услуги</th>
      <th scope="col">Цена услуги</th>
      <th scope="col">Записаться на прием</th>
    </tr>
  </thead>
  <tbody>
    <?
    $sql = "SELECT * FROM usluga, vrach, users, spec WHERE vrach.id_usluga = usluga.id_usluga AND vrach.id_spec = spec.id_spec AND vrach.id_user = users.id_user and users.id_role = 3";
    $result=$mysqli->query($sql);
    foreach($result as $row){
        echo'
    <tr>
      <td>'.$row['fio'].'</td>
      <td>'.$row['name_spec'].'</td>
      <td>'.$row['name_usl'].'</td>
      <td>'.$row['price'].' рублей</td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Записаться</button></td>
    </tr><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="addzapis.php" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Записаться на прием</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
  <div class="mb-3">
    <label for="date_zapis" class="form-label">Выберите дату</label>
    <input type="date" class="form-control" id="date_zapis" name="date_zapis" required>
  </div>
  <div class="mb-3">
    <label for="time_zapis" class="form-label">Выберите время</label>
    <input type="time" class="form-control" name="time_zapis" id="time_zapis" required>
    </div>
    <input type="hidden" name="id_vrach" value="'.$row['id_vrach'].'">
        <button type="submit" class="btn btn-primary">Записаться</button>
  </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
</div>
</form>
  </div>';
      }
    ?>
  </tbody>
</table>
</div>
        </div>
        <div class="col-1"></div>
    </div>
</div>