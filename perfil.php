<?php

session_start();
require 'functions.php';

$user;
$fullname = 'Nombre apellido';
$edit;
if($_GET) {
	if(isset($_GET['id'])) {
		$user = getUserById($_GET['id']);
		if(count($user) == 0) {
			$fullname = 'Nombre apellido';
		} else {
      $fullname = $user['name'] . ' ' . $user['surname'];
      if(isset($_SESSION['user'])) {
        if($_SESSION['user']['email'] == $user['email']) {
          $edit = '<button class="seguir"type="submit" name="edit-profile">Editar perfil</button>';
        }
      }
		}
	}
}

include('header.php');
?>
    <section class="general-content">
      <section class="move_left_desktop">
        <div class="descripcion-perfil">
          <img src="images/profile-img.jpg" class="profile-image" alt="profile image">
            <ul class="avatar-info" id="nav">
              <h3 class="h3-perfil"><?=$fullname?></h3>
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
            <?=$edit ?? ''?>
          </ul>
        </div>
    </section>
      <main>
        <section class="additional-info">
          <nav class="section-na navbar navbar-expand-lg navbar-light bg-light justify-content-center section-na-perfil">
              <ul class="navbar-nav">
                <li class="nav-item navItemPerfil">
                  <a class="abajo linksection" href="perfil.php">Información</a>
                </li>
                <li class="nav-item navItemPerfil">
                  <a class="abajo linksection" href="perfil.php">Trabajo<a>
                </li>
                <li class="nav-item navItemPerfil">
                  <a class="abajo linksection" href="perfil.php">Apreciaciones</a>
                </li>
              </ul>
          </nav>
        </section>
        <section class="portfolio_thumbnails">
          <div class="publicaciones-perfil container">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                 <a href="perfil.php"><img src="images/publicacion2.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                 <a href="perfil.php"><img src="images/publicacion1.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion3.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion4.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion5.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion6.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion7.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion8.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion9.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion10.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion11.jpg" alt=""></a>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 publicacion-perfil">
                <a href="perfil.php"><img src="images/publicacion12.jpg" alt=""></a>
              </div>
            </div>
          </div>

        </section>
      </main>
  <?php include('footer.php');?>