<?php

class Validator {

    public function isEmpty($data):bool {
        return !isset($data) || trim($data) == '';
    }

    public function isEmail(string $email):bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function passLength(string $pass, int $min = 8, int $max = 16) {
        return strlen($pass) >= $min && strlen($pass) <= $max;
    }

    public function isNumber(string $s):bool {
        return is_numeric($s);
    }

    public function isLoginSuccess(array $data, $usuario):bool {
        if($this->isEmpty($data['email']) || $this->isEmpty($data['password'])) {
            return false;
        }
        if(!password_verify($data['password'], $usuario['password'])) {
            return false;
        }
        return true;
    }

    public function validateRegister(array $data):array {
        $errors = [];
        if($this->isEmpty($data['email'])) {
            $errors['email-set'] = "* Completa el campo de correo electrónico.";
        } else if(!$this->isEmail($data['email'])) {
            $errors['email-format'] = "* El formato del correo es inválido.";
        } else if(!isAvailable($data['email'])) {
            $errors['email-used'] = "* Ese correo electrónico ya esta en uso.";
        }
        if($this->isEmpty($data['name'])) {
            $errors['name-set'] = "* Completa tu nombre.";
        }
        if($this->isEmpty($data['surname'])) {
            $errors['surname-set'] = "* Completa tu apellido.";
        }
        if($this->isEmpty($data['password'])) {
            $errors['pass-set'] = "* Completa tu contraseña.";
        } else if(!$this->passLength($data['password'], 8, 16)) {
            $errors['pass-length'] = "* Tu contraseña deve tener entre 8 y 16 caracteres.";
        }
        if($this->isEmpty($data['country'])) {
            $errors['country'] = "* Selecciona tu país.";
        }
        if($this->isEmpty($data['day']) || $this->isEmpty($data['year']) || $this->isEmpty($data['month'])) {
            $errors['birthday'] = "* Completa tu fecha de nacimiento.";
        } else if(!$this->isNumber($data['day']) || !$this->isNumber($data['year'])) {
            $errors['birthday-format'] = "* Fecha de cumpleaños erronea.";
        }
        return $errors;
    }

}



?>