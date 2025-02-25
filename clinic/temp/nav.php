
<body>
    <header>
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
<nav class="" style="background-color: #e3f2fd;">

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Главная</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="specialist.php">Наши специалисты</a>
  </li>

  <?php if(empty( $_SESSION['id_user'])){?>
  <li class="nav-item">
    <a class="nav-link" href="registration.php">Регистрация</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Войти</a>
  </li>
  <?php }?>
  <?php if(!empty( $_SESSION['role']) && $_SESSION['role'] == 'Специалист отдела обработки данных'){?>
    <li class="nav-item">
    <a class="nav-link" href="datamanager.php">Личный кабинет</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Выйти</a>
  </li>
  <?php }?>
</ul>
</nav>
</header>