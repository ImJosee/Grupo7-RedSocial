<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactanos</title>

    <script src="https://kit.fontawesome.com/2260a42856.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contacto.css">
</head>
<body>
    <div class="container">
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

        <main>
            <form action="">
                <div class="header-info">
                    <h2 class="contact"></h2>
                    <h1 class="header">
                        <strong>Envianos tu comentario</strong>
                    </h1>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="labels" for="email">Dirección de correo electrónico</label>
                        <input type="email" class="form-control" id="email">
                     </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="labels" for="nombre" required>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                     </div>
                    <div class="col">
                        <label class="labels" for="apellido" required>Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="labels" for="comentario">Comentario</label>
                        <textarea name="comentario"  class="form-control" rows="8" cols="80"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <p>
                          Por favor ingrese los detalles de su consulta y un miembro de atencion al cliente se pondra en contacto a la brevedad.
                        </p>
                    </div>
                </div>
                <div class="form-row">
                  <label class="labels" for="browser">Browser</label>
                      <select class="custom-select" id="inlineFormCustomSelect">
                          <option selected>Elige..</option>
                          <option value="1">Android mobile browser</option>
                          <option value="2">iOS Safari</option>
                          <option value="3">Internet Explorer</option>
                          <option value="4">Firefox</option>
                          <option value="5">Microsoft Edge</option>
                          <option value="6">Chrome</option>
                          <option value="7">Safari</option>
                          <option value="8">No lo se</option>
                          <option value="9">No listado</option>
                      </select>
                 </div>

                 <div class="form-row">
                   <div class="col">
                       <label class="labels" for="digitalMe-usuaio" required>Nombre de usuario de <b>digitalMe</b></label>
                       <input type="text" class="form-control" name="apellido" id="apellido">
                   </div>
                 </div>

                <div class="form-row">
                    <div class="col">
                        <button type="submit" class="enviar btn btn-success">Enviar</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
<?php include 'footer.php';?>
