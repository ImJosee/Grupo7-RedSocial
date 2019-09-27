<?php

require 'functions.php';

class User {

    private $email;
    private $name;
    private $country;
    private $birthday;
    private $lang;

    public function __construct(string $email) {
        $this->$email = $email;
        $data = getUsuario($email);
        $this->$name = $data['name'];
        $this->$country = $data['country'];
        $this->$birthday = $data['birthday'];
        $this->$password = $data['password'];
    }

    public function getName():string {
        return $this->$name;
    }

    public function getEmail():string {
        return $this->$email;
    }

    public function getCountry():string {
        return $this->$country;
    }

    public function getBirthday():string {
        return $this->$birthday;
    }

    public function getLang():string {
        return $this->$lang;
    }

    public function setName(string $name):void {
        $this->$name = $name;
    }

    public function setBirthday(Date $date):void {
        $this->$birthday = $date->format('d-m-Y');
    }

    public function setCountry(string $country):void {
        $this->$country = $country;
    }

    public function setLang(string $lang):void {
        $this->$lang = $lang;
    }

    public function getPasswordHash():string {
        return $this->$password;
    }

    public function save():void {
        
    }

}


?>