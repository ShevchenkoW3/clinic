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
            <button type="button" class="btn btn-primary btnnewusluga" data-bs-toggle="modal" data-bs-target="#newUsluga">Добавить услугу</button>
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
                            <td><button type="button" class="btn btn-primary btnusluga" 
                                data-bs-toggle="modal" data-bs-target="#price" 
                                data-id_usluga="'.$row['id_usluga'].'" >Изменить</button></td>
                            </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="price" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Новая цена</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
         <form  method="POST" action="edit.php">
         <div class="mb-3">
        <label for="price" class="form-inline">Введите новую цену</label>
            <input type="text" class="form-control" name="price">
        </div>
<?php
  echo '
  <br><input type="hidden" id="id_usluga" name="id_usluga">'; 
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="newUsluga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить услугу</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
         <form  method="POST" action="new_usluga.php">
         <div class="mb-3">
        <label for="name_usl" class="form-inline">Введите название услуги</label>
            <input type="text" class="form-control" name="name_usl">
        </div>
        <div class="mb-3">
        <label for="price" class="form-inline">Введите новую цену</label>
            <input type="text" class="form-control" name="price">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('#price').on('show.bs.modal', function (event) {
// кнопка, которая вызывает модаль
 var button = $(event.relatedTarget) 
// получим  data-id_user атрибут
  var id_usluga = button.data('id_usluga');
   // Здесь изменяем содержимое модали
  var modal = $(this);
 modal.find('.modal-title').text('Изменить цену услуги');
 modal.find('.modal-body #id_usluga').val(id_usluga);
})
});
</script>
<script>
$(document).ready(function(){
  $('#newUsluga').on('show.bs.modal', function (event) {
// кнопка, которая вызывает модаль
 var button = $(event.relatedTarget) 
   // Здесь изменяем содержимое модали
  var modal = $(this);
 modal.find('.modal-title').text('Новая услуга');
 /* modal.find('.modal-body #name_usl').val(name_usl);
 modal.find('.modal-body #price').val(price); */
})
});
</script>