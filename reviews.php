<?php session_start()?>
<?php 
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav_specialist.php';
?>
<?php 
$sql = "SELECT * FROM zapis, vrach, users, usluga WHERE 
zapis.id_vrach = vrach.id_vrach 
AND zapis.id_user = users.id_user
AND vrach.id_usluga = usluga.id_usluga
AND otziv IS NOT NULL ORDER BY id_zapis DESC";
$result = $mysqli->query($sql);
$zapiss = $result->fetch_all(MYSQLI_ASSOC)


// print "<pre>";
// print_r($vrachi);
 ?>
<main>
<div class="container">
    <div class="row">
 <h2 class="name">Отзывы</h2>
 <section id="vrach">
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary mb-4" href="/datamanager.php">Перейти в панель обработки данных</a>
            <table class="table table-striped">
					<thead>
                    <tr>
                    <th scope="col">Ф.И.О. пациента</th>
                    <th scope="col">Наименование услуги</th>
                    <th scope="col">Дата  приёма</th>
                    <th scope="col">Отзыв</th>
                    <th scope="col">Ответ</th>
                    <th scope="col">Ответить</th>
                    </tr>
                </thead>
                <tbody>
                
                            <?php foreach ($zapiss as $zapis) {
                                echo '
                                <tr>
                                <td>'.$zapis['fio'].'</td> 
                                <td>'.$zapis['name_usl'].'</td>
                                <td>'.$zapis['date_zapis'].'</td>
                                <td>'.$zapis['otziv'].'</td>
                                <td>'.$zapis['otvet'].'</td>';
                                if($zapis['otvet'] == ''){
                                    echo '<td><button type="button" class="btn btn-primary btnotvet" 
                                    data-bs-toggle="modal" data-bs-target="#otvet" 
                                    data-id_zapis="'.$zapis['id_zapis'].'" >Ответить</button></td>';
                                    
                                }
                                else{
                                    echo '<td></td>'; 
                                }
                                echo '</tr>';
                                
                            } 
                            ?>
                </tbody>
                </table>
                <div class="modal fade" id="otvet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Записаться на прием</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
         <form  method="POST" action="otvet.php">
         <div class="mb-3">
        <label for="otvet" class="form-inline">Введите ответ</label>
        <textarea name="otvet" class="form-control" cols="30" rows="10" required></textarea>
        </div>
<?php
  echo '
  <br><input type="hidden" id="id_zapis" name="id_zapis">'; 
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
        </div>
        </div>
    </div>
</section>
</div>
</div>
</main>
<script>
$(document).ready(function(){
  $('#otvet').on('show.bs.modal', function (event) {
// кнопка, которая вызывает модаль
 var button = $(event.relatedTarget) 
// получим  data-id_user атрибут
  var id_zapis = button.data('id_zapis');
   // Здесь изменяем содержимое модали
  var modal = $(this);
 modal.find('.modal-title').text('Ответ на отзыв');
 modal.find('.modal-body #id_zapis').val(id_zapis);
})
});
</script>
