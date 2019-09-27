<?php
    
    define('DB', json_decode(file_get_contents('users.json'), true));

    function validateRegister() {
        $errors = [];
        if(strlen($_POST['email']) == 0) {
            $errors['email-set'] = '* Debes rellenar tu correo electronico.';
		} else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email-format'] = '* El formato del email es invalido.';
        } else if(!isAvailable($_POST['email'])) {
            $errors['email-used'] = '* Ese correo electronico ya esta en uso.';
        }
        if(!isset($_POST['name'])) {
            $errors['name-set'] = '* Debes rellenar el nombre de usuario.';
        } else if(empty($_POST['name'])) {
            $errors['name-set'] = '* Debes rellenar el nombre de usuario.';
        }
        if(!isset($_POST['surname'])) {
            $errors['surname-set'] = '* Debes rellenar tu apellido.';
        } else if(empty($_POST['surname'])) {
            $errors['surname-set'] = '* Debes rellenar tu apellido.';
        }
        if(strlen($_POST['password']) == 0) {
            $errors['pass-set'] = '* Debes rellenar con tu password.';
        } else if(strlen($_POST['password']) < 8) {
            $errors['pass-length'] = '* Tu password debe tener 8 caracteres minimo.';
        }
        if(!isset($_POST['country'])) {
            $errors['country'] = '* Selecciona tu pais.';
        }
        if($_POST['day'] == '' || $_POST['month'] == 'Elige..' || $_POST['year'] == '') {
            $errors['birthday'] = '* Completa tu fecha de nacimiento';
        } else if(!is_numeric($_POST['day']) || !is_numeric($_POST['year'])) {
            $errors['birthday-format'] = '* Fecha de cumpleaños erronea.';
        }
        return $errors;
    }

    function isAvailable($email) {
        foreach(DB['usuarios'] as $user) {
            if($user['email'] == $email) {
                return false;
            }
        }
        return true;
    }

    function getUsuario($email) {
        foreach(DB['usuarios'] as $user) {
            if($email === $user['email']) {
                return [
                    'name' => $user['name'],
                    'email' => $email,
                    'password' => $user['password'],
                    'id' => $user['id'],
                    'surname' => $user['surname'],
                    'country' => $user['country'],
                    'birthday' => $user['birthday']
                ];
            }
        }
    }

    function getUserById($id) {
        foreach(DB['usuarios'] as $user) {
            if($id == $user['id']) {
                return [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'id' => $user['id'],
                    'surname' => $user['surname'],
                    'country' => $user['country'],
                    'birthday' => $user['birthday']
                ];
            }
        }
    }

    function successLogin($email) {
        $usuario = getUsuario($email);
        unset($usuario['password']);
        $_SESSION['user'] = $usuario;
    }

    function redirect($url) {
        header('location: '.$url);
    }

    function persistence() {
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['surname'] = $_POST['surname'];
        $data['password'] = $_POST['password'];
        $data['country'] = $_POST['country'];
        $data['day'] = $_POST['day']; 
        $data['year'] = $_POST['year']; 
        $data['month'] = $_POST['month']; 
        return $data;
    }

    function isLogged($user) {

    }

?>