<?php
    
    define('DB', json_decode(file_get_contents('users.json'), true));
    require 'objects/validator.php';
    require 'objects/utils.php';

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

?>