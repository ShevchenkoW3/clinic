
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