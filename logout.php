<?php

session_start();
require 'functions.php';

session_destroy();
if(isset($_COOKIE['remember'])) {
    setcookie('remember', '', -1);
}
redirect('login.php');
?>