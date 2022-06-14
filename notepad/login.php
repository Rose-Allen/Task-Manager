<?php
session_start();
require_once "db/connect.php";


$email = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember'];
$sql = "SELECT * FROM register WHERE email=:email";
$res = $pdo->prepare($sql);
$res->execute(['email'=>$email]);
$user = $res->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])){
    if ($email!=''&& $password!=''){
        if (password_verify($password,$user['password'])){
            $_SESSION['username'] =$user['name'];
            $_SESSION['id'] = $user['id'];
            setcookie('flag', $remember,time()+3600);
            setcookie('name', $_SESSION['username'],time()+3600);
            header("Location: profile.php");
        }else{
            $_SESSION['isset_user_auth'] = "Неверный логин или пароль";
            $_SESSION['error'] = "Пожалуйста, Заполните все поля!";
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }else{
        $_SESSION['error'] = "Пожалуйста, Заполните все поля!";
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}

//if (!empty($user)){
//    $_SESSION['isset_email'] = "Пользователь с таким E-mail существует";
//    $referer = $_SERVER['HTTP_REFERER'];
//    header("Location: $referer");
//    exit;
//}
