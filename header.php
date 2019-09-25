<?php

$button = "Iniciar sesión con correo";
$myProfile;
$logout;

if(isset($_SESSION['user'])) {
  $button = "Crear un proyecto";
  $myProfile = '<a class="nav-item nav-link" href="perfil.php?id='.$_SESSION['user']['id'].'">Mi Perfil</a>';
  $logout = '<button type="button" class="btn btn-primary"><a class="iniciar" href="logout.php">Cerrar sesión</a></button>';
}

?>


<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2260a42856.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css"> 

    <title>DigitalMe</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"> <img class="brand-logo" src="images/dm-logo.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo01">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Descubrir</a>
          <a class="nav-item nav-link" href="faq.php">Ayuda</a>
          <?=$myProfile ?? '<a class="nav-item nav-link" href="register.php">Registro</a>'?>
          <?=$logout ?? ''?>
        </div>
        <div class="d-flex flex-row">
          <button type="button" class="btn btn-primary"><a class="iniciar" href="login.php"><?=$button?></a></button>
          <p class="o">o</p>
          <a href="#"><img class="logos" src="images/busqueda.png" alt=""></a>
          <a href="#"><img class="logos" src="images/facebook.png" alt=""></a>
          <a class="lupa" href="#"><ion-icon name="search"></ion-icon></a>
        </div>
      </div>
    </nav>
