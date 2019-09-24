<?php

session_start();
require 'functions.php';

$user;
$fullname = 'Nombre apellido';
if($_GET) {
	if(isset($_GET['id'])) {
		$user = getUserById($_GET['id']);
		if(count($user) == 0) {
			$fullname = 'Nombre apellido';
		} else {
			$fullname = $user['name'] . ' ' . $user['surname'];
		}
	}
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/perfil.css">
    <title>Mi Perfil</title>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="perfil.php">
      <img class="brand-logo" src="images/dm-logo.svg" alt="">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo01">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="perfil.php">Descubrir</a>
          <a class="nav-item nav-link" href="perfil.php">En directo</a>
          <a class="nav-item nav-link" href="faqs.php">Ayuda</a>
        </div>
        <div class="d-flex flex-row">
          <button type="button" class="btn btn-primary"><a class="iniciar" href="login.php">Iniciar sesión con correo</a></button>
          <p class="o">o</p>
          <a href="www.google.com"><img class="logos" src="images/busqueda.png" alt=""></a>
          <a href="www.facebook.com"><img class="logos" src="images/facebook.png" alt=""></a>
          <a class="lupa" href="www.google.com"><ion-icon name="search"></ion-icon></a>
        </div>
      </div>
  </nav>
    <section class="general-content">
      <section class="move_left_desktop">
        <div class="descripcion">
          <img src="images/profile-img.jpg" class="profile-image" alt="profile image">
            <ul class="avatar-info" id="nav">
              <h3><?=$fullname?></h3>
              <li>Job Title</li>
              <li>Empresa</li>
              <li> <a href="#">www.digital-me.com</a> </li>
              <li> <a href="#"><img src="images/location.svg" class="location-icon" alt="location icon">Lugar</a> </li>
            </ul>
        </div>
        <div class="">
            <ul class="fol-mes-buttons">
            <button class="seguir" type="submit" name="seguir">Seguir</button>
            <button class="mensaje"type="submit" name="mensaje">Mensaje</button>
          </ul>
        </div>
    </section>
      <main>
        <section class="additional-info">
          <nav class="section-na navbar navbar-expand-lg navbar-light bg-light justify-content-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="abajo linksection" href="perfil.php">Información</a>
                </li>
                <li class="nav-item">
                  <a class="abajo linksection" href="perfil.php">Trabajo<a>
                </li>
                <li class="nav-item">
                  <a class="abajo linksection" href="perfil.php">Apreciaciones</a>
                </li>
              </ul>
          </nav>
        </section>
        <section class="portfolio_thumbnails">
          <div class="publicaciones container">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                 <a href="perfil.php"><img src="images/publicacion2.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                 <a href="perfil.php"><img src="images/publicacion1.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion3.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion4.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion5.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion6.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion7.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion8.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion9.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion10.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion11.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion">
                <a href="perfil.php"><img src="images/publicacion12.jpg" alt=""></a>
              </div>
            </div>
          </div>

        </section>
      </main>
      <footer>
        <div class="copy"> © 2018 Copyright: digitalMe</div>
      </footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
