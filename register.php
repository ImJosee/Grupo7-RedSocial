<?php

session_start();
require 'functions.php';

if(!filesize('users.json')) {
    $users = [
        'usuarios' => []
    ];
    @file_put_contents('users.json', json_encode($users));
}

$months = [
    "1" => "Enero",
    "2" => "Febrero",
    "3" => "Marzo",
    "4" => "Abril",
    "5" => "Mayo",
    "6" => "Junio",
    "7" => "Julio",
    "8" => "Agosto",
    "9" => "Septiembre",
    "10" => "Octubre",
    "11" => "Noviembre",
    "12" => "Diciembre"
];

$countries = [
    "ARG" => "Argentina",
    "BR" => "Brasil",
    "PY" => "Paraguay",
    "CHL" => "Chile",
    "BOL" => "Bolivia",
    "PR" => "Perú",
    "ECU" => "Ecuador",
    "COL" => "Colombia",
    "URU" => "Uruguay"
];

$errors = [];
$data = [];

if($_POST) {
    $data = persistence();
    $errors = validateRegister();
    if(count($errors) == 0) {
        $json = json_decode(file_get_contents('users.json'), true);
        $id = (count($json['usuarios']) + 1);
        $date = new DateTime($_POST['year'].'-'.$_POST['month'].'-'.$_POST['day']);
        $date = $date->format('d-m-Y');
        $usuario = [
            'id' => $id,
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'country' => $_POST['country'],
            'birthday' => $date,
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        if($_FILES) {
            $path = dirname(__FILE__) . "/profile-images/" . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
        }
        $json['usuarios'][] = $usuario;
        file_put_contents('users.json', json_encode($json, JSON_PRETTY_PRINT));

        if(isset($_POST['remember'])) {
            setcookie('user_login', $_POST['email'], time() + 3600 * 24); 
        }
    
        $_SESSION['user'] = getUsuario($_POST['email']);
        redirect("index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate | DigitalMe</title>

    <script src="https://kit.fontawesome.com/2260a42856.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <main>
            <div class="header-container">
                <div>
                    <img class="logo" src="images/dm-logo.svg" alt="Logo del proyecto">
                </div>
            </div>
            <form action="register.php" method="post">
                <div class="header-info">
                    <h2 class="register">Crear una cuenta</h2>
                    <h1 class="header">
                        <strong>DigitalMe</strong>
                    </h1>
                    <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
                    <p>¿Registrando una empresa? <a href="enterprise.php">Haz click aquí</a></p>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="labels" for="email">Dirección de correo electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?=$data['email'] ?? ''?>">
                        <div class='error-email'>
                            <p style='color: red;'><?=$errors['email-set'] ?? ''?></p>
                            <p style='color: red;'><?=$errors['email-format'] ?? ''?></p>
                            <p style='color: red;'><?=$errors['email-used'] ?? ''?></p>
                        </div>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="labels" for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="name" id="nombre" value="<?=$data['name'] ?? ''?>">
                        <div class='error-name'>
                            <p style='color: red;'><?=$errors['name-set'] ?? ''?></p>
                        </div>
                     </div>
                    <div class="col">
                        <label class="labels" for="apellido">Apellidos</label>
                        <input type="text" class="form-control" name="surname" id="apellido" value="<?=$data['surname'] ?? ''?>">
                        <div class='error-surname'>
                            <p style='color: red;'><?=$errors['surname-set'] ?? ''?></p>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="labels" for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?=$data['password'] ?? ''?>">
                        <div class='error-password'>
                            <p style='color: red;'><?=$errors['pass-set'] ?? ''?></p>
                            <p style='color: red;'><?=$errors['pass-length'] ?? ''?></p>
                        </div>
                     </div>
                </div>
                <p class="subtitle">Fecha de nacimiento</p>
                <div class="form-row">
                    <div class="col">
                        <label class="labels mr-sm-2" for="inlineFormCustomSelect">Mes</label>
                        <select name="month" class="custom-select" id="inlineFormCustomSelect">
                            <?php foreach($months as $code => $name) : ?>
                                <?php if($_POST) : ?>
                                    <?php if($_POST['month'] == $code) :?>
                                        <option value="<?=$code?>" selected><?=$name?></option>
                                    <?php else : ?>
                                        <option value="<?=$code?>"><?=$name?></option>
                                    <?php endif ?>
                                <?php else : ?>
                                    <option value="<?=$code?>"><?=$name?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                     </div>
                     <div class="col">
                        <label class="labels" for="dia">Día</label>
                        <input type="text" class="form-control" name="day" id="dia" value="<?=$data['day'] ?? ''?>">
                     </div>
                     <div class="col">
                        <label class="labels" for="año">Año</label>
                        <input type="text" class="form-control" name="year" id="año" value="<?=$data['year'] ?? ''?>">
                     </div>
                </div>
                <div class='error-birthday'>
                    <p style='color: red;'><?=$errors['birthday'] ?? ''?></p>
                    <p style='color: red;'><?=$errors['birthday-format'] ?? ''?></p>
                </div>
                <div class="form-row">
                      <div class="col">
                        <label class="labels mr-sm-2" for="inlineFormCustomSelect">País</label>
                        <select name="country" class="custom-select" id="inlineFormCustomSelect">
                        <?php foreach($countries as $code => $name) : ?>
                                <?php if($_POST) : ?>
                                    <?php if($_POST['country'] == $code) :?>
                                        <option value="<?=$code?>" selected><?=$name?></option>
                                    <?php else : ?>
                                        <option value="<?=$code?>"><?=$name?></option>
                                    <?php endif ?>
                                <?php else : ?>
                                    <option value="<?=$code?>"><?=$name?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                     </div>
                </div>
                <div class='error-birthday'>
                    <p style='color: red;'><?=$errors['country'] ?? ''?></p>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="checkbox" name="remember"><span>  Recordar mi sesión</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <p>
                        Haciendo clic en Crear cuenta, estoy de acuerdo en haber leído y aceptado <a href="#terminos&condiciones">la Condiciones de uso y la Política de privacidad</a>.
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <button type="submit" class="registrar btn btn-success">Crear cuenta</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
