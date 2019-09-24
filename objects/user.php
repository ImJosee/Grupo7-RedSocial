<?php

require 'functions.php';

class User {

    function __construct(string $email) {
        $this->$email = $email;
        $data = getUsuario($email);
        $this->$name = $data['name'];
        $this->$country = $data['country'];
        $this->$birthday = $data['birthday'];
        $lang = 'ES';
        $this->$password = $data['password'];
    }

    public function getName() {
        return $this->$name;
    }

    public function getEmail() {
        return $this->$email;
    }

    public function getCountry() {
        return $this->$country;
    }

    public function getBirthday() {
        return $this->$birthday;
    }

    public function getLang() {
        return $this->$lang;
    }

    public function setName(string $name) {
        $this->$name = $name;
    }

    public function setBirthday(date $date) {
        $this->$birthday = $date->format('d-m-Y');
    }

    public function setCountry(string $country) {
        $this->$country = $country;
    }

    public function setLang(string $lang) {
        $this->$lang = $lang;
    }

    public function getPasswordHash() {
        return $this->$password;
    }

}


?>