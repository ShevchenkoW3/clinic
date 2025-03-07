<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Частная клиника</title>
    <link href= "css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery-3.6.0.js"></script><script>
$(document).ready(function(){
  $('#myModal').on('show.bs.modal', function (event) {
// кнопка, которая вызывает модаль
 var button = $(event.relatedTarget) 
// получим  data-id_user атрибут
  var id_user = button.data('id_user') 
// получим  data-fio атрибут
  var fio = button.data('fio');
   // Здесь изменяем содержимое модали
  var modal = $(this);
 modal.find('.modal-title').text('Уволить '+fio+' '+id_user);
 modal.find('.modal-body #iduser').val(id_user);
})
});
</script>
</head>
<body><? echo'
<td><button type="button" class="btn btn-danger btnuvol" 
data-toggle="modal" data-target="#myModal" 
data-id_user="'.$row['id_user'].'" data-fio="' .$row['fio'].'" >Уволить</button></td>';?>
указывает какое модальное окно открыть(id)
указывает какие данные нужно передать в него
 <!--  модальноe окнo -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <h4 class="modal-title">Уволить официанта</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">  
       <div class="form-group mb-2  col-12">
         <form  method="post"  role="form" class="form-inline">
<?php
  echo '<br><input type="hidden" id="iduser" name="id_user">'; 
//НЕВИДИМОЕ ОКНО ВВОДА, ЧТОБЫ ПЕРЕДАТЬ ID_USER В $_POST
?>
     <input type="date" name="d_uvol">        
 </div>
</div>
<!-- Футер модального окна -->
 <div class="modal-footer">
 <button type="button" class="close" data-dismiss="modal" 
aria-hidden="true"> Закрыть</button>
 <button type="submit" name="submit" class="btn btn-primary"> Уволить официанта</button>
</form>
 </div>
</div>
</div>
</div> 


Для того, чтобы передать данные в модальное окно скрипт
<!-- Вызов модального окна -->






</body>
</html>