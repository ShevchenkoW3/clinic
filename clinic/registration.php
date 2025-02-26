
<title>Регистрация</title>
<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fio = $_POST['fio'];
    $sql = "INSERT INTO users(login, password, email, fio) VALUES ('$login','$password','$email','$fio')";
    var_dump($sql);
    $result=$mysqli->query($sql);
    var_dump($result);
    header("Location: login.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
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
    <input type="password" class="form-control" id="password" name="password" minlength="6" required>
  </div>
  <div class="mb-3">
    <label for="fio" class="form-label">ФИО</label>
    <input type="text" class="form-control" id="fio" name="fio"  pattern="[А-Яа-яЁё ]+" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Адрес электронной почты</label>
    <input type="email" size="32" minlength="3" maxlength="64" class="form-control" id="email" name="email" required>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
        </div>
        <div class="col-3"></div>
    </div>
</div>