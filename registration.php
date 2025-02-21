<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
$message = '';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $email = $_POST['email'];
    $fio = $_POST['fio'];
    if($password == $password_repeat){
      $sql = "INSERT INTO users(login, password, email, fio, id_role) VALUES ('$login','$password','$email','$fio', 4)";
    var_dump($sql);
    $result=$mysqli->query($sql);
    header("Location: login.php");
    }
    else{
      $message = 'Пароли не совпадают';
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="text-center">
                <h1>Регистрация</h1>
</div>
        <form method="POST">
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name="login" minlength="6" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Пароль</label>
    <input type="password" class="form-control" name="password" minlength="6" required>
  </div>
  <div class="mb-3">
    <label for="password_repeat" class="form-label">Повторите пароль</label>
    <input type="password" class="form-control" name="password_repeat" minlength="6" required>
  </div>
  <div class="mb-3">
    <label for="fio" class="form-label">ФИО</label>
    <input type="text" class="form-control" name="fio"  pattern="[А-Яа-яЁё ]+" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Адрес электронной почты</label>
    <input type="email" size="32" minlength="3" maxlength="64" class="form-control" name="email" required>
  </div>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form><br>
<p id="result"></p>
<p><?php echo $message ?></p>
        </div>
        <div class="col-1"></div>
    </div>
</div>