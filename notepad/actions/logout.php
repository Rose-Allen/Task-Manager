<?php

session_start();
unset($_SESSION['username']);
unset($_COOKIE['name']);
//unset($_COOKIE['name']);
header('Location: ../form/login_form.php');
