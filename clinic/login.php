
<title>Авторизация</title>
<?php
include 'temp/head.php';
include 'temp/database.php';
include 'temp/nav.php';
$message = '';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users, role WHERE login = '$login' and password = '$password' AND users.id_role = role.id_role";
    $result=$mysqli->query($sql);
    if(!empty($result)){
        $userdata = $result->fetch_assoc();
        session_start();
        $_SESSION['id_user'] = $userdata['id_user'];
        $_SESSION['role'] = $userdata['role'];
        if($userdata['role'] == 'Клиент'){
            var_dump($userdata);
             header('location: lkclient.php');
        }
        elseif($userdata['role'] == 'Администратор'){
                var_dump($userdata);
                header('location: lkadmin.php');
        }
        elseif($userdata['role'] == 'Специалист отдела обработки данных'){
            var_dump($userdata);
            header('location: datamanager.php');
        }
        else{
            $message ="Неверный логин или пароль";
        }
}
}
?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="text-center">
                <h1>Авторизация</h1>
</div>
        <form method="POST">
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name="login" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<h5><?php echo $message;?></h5>

        </div>
        <div class="col-3"></div>
    </div>
</div>