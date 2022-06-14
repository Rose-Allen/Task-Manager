<?php
require_once "../db/connect.php";
require_once "../assets/header.php";
require_once "../assets/navbar.php";

$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['img'];
$id = $_GET['id'];
$tmp_name = $image['tmp_name'];
$file_name = $image['name'];
$path = '../upload/'.$file_name;

if (isset($_POST['btn'])){
    if ($title!=''&& $description!=''){
        move_uploaded_file($tmp_name, $path);
        $sql = "UPDATE `card` SET `title` = ?, `description` = ?, `img` = ? WHERE `card`.`id`=$id";
//        $sql = "INSERT INTO `card`(`user_id`, `title`, `description`, `img`) VALUES (?,?,?,?);";
        $res = $pdo->prepare($sql);
        $res->execute([$title,$description,$file_name]);
        header("Location: ../profile.php");
    }else{
        $_SESSION['error'] = "Пожалуйста, Заполните все поля!";
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit;
    }
}