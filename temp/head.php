<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Частная клиника</title>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/login.js"></script>
    <script src="js/zapis.js"></script>
    <link href= "css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
    <script src="js/bootstrap.min.js"></script> <script>
$(document).ready(function(){
  $('#myModal').on('show.bs.modal', function (event) {
// кнопка, которая вызывает модаль
 var button = $(event.relatedTarget) 
// получим  data-id_user атрибут
  var id_vrach = button.data('id_vrach') 
// получим  data-fio атрибут
   // Здесь изменяем содержимое модали
  var modal = $(this);
 modal.find('.modal-title').text('Записаться к '+id_vrach);
 modal.find('.modal-body #id_vrach').val(id_vrach);
})
});
</script>
</head>
<body>
    <div class="container">
        <div class="row"style="margin-top:10px;margin-bottom:10px;">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="row">
                <div class="col-2">
                    <img src="img/hospital.png" alt="" style="height:100px;">
                </div>
                <div class="col-4">
                    <div class="text-center"style="padding-top:10px;"><h3>ЧАСТНАЯ КЛИНИКА<BR>"ЗДОРОВЬЕ"</BR></h3></div>
                </div>
            <div class="col-2"></div>
            <div class="col-3">
                <div class="text-center">
                    <p>Ленинский проспект, 233/5</p>
                    <p>+7 (***)</p>
                </div></div>
            </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>