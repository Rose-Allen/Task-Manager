<?php
session_start();
require_once "db/connect.php";
$name = trim($_POST['username']);
$email =trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM register WHERE email=:email";
$res = $pdo->prepare($sql);
$res->execute(['email'=>$email]);
$user = $res->fetch(PDO::FETCH_ASSOC);
if (!empty($user)){
    $_SESSION['isset_email'] = "Пользователь с таким E-mail существует";
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit;
}

//$sql = "INSERT INTO register (`name`,`email`,`password`) VALUES (?,?,?)";
//$res = $pdo->prepare($sql);
//$res->bindParam(1,$name);
//$res->bindParam(2,$email);
//$res->bindParam(3,$password);
//$res->execute();
//$sql = "SELECT * FROM register WHERE email=:email";
//$res = $pdo->prepare($sql);
//$res->execute(['email'=>$email]);
//$user = $res->fetchAll(PDO::FETCH_ASSOC);
//if (!empty($user)){
//    $_SESSION['isset_email'] = "Пользователь с таким E-mail существует";
//    $referer = $_SERVER['HTTP_REFERER'];
//    header("Location: $referer");
//}

if (isset($_POST['btn'])){
    if ($name!='' && $password!='' && $email!=''){
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO register (`name`,`email`,`password`) VALUES (?,?,?)";
        $res = $pdo->prepare($sql);
        $res->bindParam(1,$name);
        $res->bindParam(2,$email);
        $res->bindParam(3,$hash_password);
        $res->execute();
        header('Location: form/login_form.php');
    }else{
        $_SESSION['error'] = "Пожалуйста, Заполните все поля!";
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit;
    }
//  echo  "${name} ${email} ${password}";
}else{
    $_SESSION['error'] = "Пожалуйста, Заполните все поля!";
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit;
}