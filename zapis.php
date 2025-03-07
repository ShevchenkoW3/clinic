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
    <td><button type="button" class="btn btn-primary btnzapis" 
data-bs-toggle="modal" data-bs-target="#myModal" 
data-id_vrach="'.$row['id_vrach'].'" >Записаться</button></td>
</tr>';
      }
    ?>
  </tbody>
</table> <!--  модальноe окнo -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Записаться на прием</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
         <form  method="POST" action="addzapis.php">
  <div class="mb-3">
    <label for="date_zapis" class="form-label">Дата</label>
    <input type="date" class="form-control" id="date_zapis" name="date_zapis" required>
  </div>
  <div class="mb-3">
    <label for="time_zapis" class="form-label">Время</label>
    <input type="time" class="form-control" id="time_zapis" name="time_zapis" required>
  </div>
<?php
  echo '
  <br><input type="hidden" id="id_vrach" name="id_vrach">'; 
  
//НЕВИДИМОЕ ОКНО ВВОДА, ЧТОБЫ ПЕРЕДАТЬ ID_USER В $_POST
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Записаться</button>
      </div>
    </form>
    </div>
  </div>
</div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('#myModal').on('show.bs.modal', function (event) {
// кнопка, которая вызывает модаль
 var button = $(event.relatedTarget) 
// получим  data-id_user атрибут
  var id_vrach = button.data('id_vrach');
   // Здесь изменяем содержимое модали
  var modal = $(this);
 modal.find('.modal-title').text('Записаться на прием');
 modal.find('.modal-body #id_vrach').val(id_vrach);
})
});
</script>