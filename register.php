<?php

session_start();
require 'functions.php';

if(!filesize('users.json')) {
    $users = [
        'usuarios' => []
    ];
    @file_put_contents('users.json', json_encode($users));
}

if($_POST) {
    $validator = new Validator();
    $errors = $validator->validateRegister($_POST);
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
        /*if($_FILES) {
            $path = dirname(__FILE__) . "/profile-images/" . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
        }*/
        $json['usuarios'][] = $usuario;
        file_put_contents('users.json', json_encode($json, JSON_PRETTY_PRINT));

        if(isset($_POST['remember'])) {
            setcookie('user_login', $_POST['email'], time() + 3600 * 24); 
        }

        unset($usuario['password']);
        $_SESSION['user'] = $usuario;
        redirect('index.php');
    }
}

include 'header.php';
?>
<div class="div-reg-container container-fluid">
    <main class="register-main">
        <div class="header-container">
            <div>
                <img class="logo" src="images/dm-logo.svg" alt="Logo del proyecto">
            </div>
        </div>
        <form class="register-form" action="register.php" method="post">
            <div class="header-info">
                <h2 class="register-h2">Crear una cuenta</h2>
                <h1 class="header">
                    <strong>DigitalMe</strong>
                </h1>
                <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
                <p>¿Registrando una empresa? <a href="enterprise.php">Haz click aquí</a></p>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="labels" for="email">Dirección de correo electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?=$_POST['email'] ?? ''?>">
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
                    <input type="text" class="form-control" name="name" id="nombre" value="<?=$_POST['name'] ?? ''?>">
                    <div class='error-name'>
                        <p style='color: red;'><?=$errors['name-set'] ?? ''?></p>
                    </div>
                    </div>
                <div class="col">
                    <label class="labels" for="apellido">Apellidos</label>
                    <input type="text" class="form-control" name="surname" id="apellido" value="<?=$_POST['surname'] ?? ''?>">
                    <div class='error-surname'>
                        <p style='color: red;'><?=$errors['surname-set'] ?? ''?></p>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="labels" for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?=$_POST['password'] ?? ''?>">
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
                        <?php foreach(Utils::getMonths() as $code => $name) : ?>
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
                        <input type="text" class="form-control" name="day" id="dia" value="<?=$_POST['day'] ?? ''?>">
                    </div>
                    <div class="col">
                        <label class="labels" for="año">Año</label>
                        <input type="text" class="form-control" name="year" id="año" value="<?=$_POST['year'] ?? ''?>">
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
                    <?php foreach(Utils::getCountries() as $code => $name) : ?>
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
<?php include 'footer.php';?>