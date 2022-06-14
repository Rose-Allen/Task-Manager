<?php
session_start();
require_once "../db/connect.php";
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['img'];
$id = $_SESSION['id'];
$tmp_name = $image['tmp_name'];
$file_name = $image['name'];
$path = '../upload/'.$file_name;
if (isset($_POST['btn'])){
       if ($title!=''&& $description!=''){
           if (move_uploaded_file($tmp_name, $path)==false){

               $_SESSION['message'] = "Файл не загружен";
               $referer = $_SERVER['HTTP_REFERER'];
               header("Location: $referer");
           }else{
               $sql = "INSERT INTO `card`(`user_id`, `title`, `description`, `img`) VALUES (?,?,?,?);";
               $res = $pdo->prepare($sql);
               $res->bindParam(1,$id);
               $res->bindParam(2,$title);
               $res->bindParam(3,$description);
               $res->bindParam(4,$file_name);
               $res->execute();
               header("Location: ../profile.php");
           }
       }else{
           $_SESSION['message'] = "Файл не загружен";
           $referer = $_SERVER['HTTP_REFERER'];
           header("Location: $referer");
       }
}

//if (isset($_POST['btn'])){
//    if ($title!=''&& $description!=''){
//        if (move_uploaded_file($tmp_name, $path)==false){
//            $_SESSION['message'] = "Файл не загружен";
//            $referer = $_SERVER['HTTP_REFERER'];
//            header("Location: $referer");
//        }else{
//            $sql = "INSERT INTO posting(`title`,`description `,`image`) VALUES (?,?,?)";
//            $res = $pdo->prepare($sql);
//            $res->bindParam(1,$title);
//            $res->bindParam(2,$description);
//            $res->bindParam(3,$path);
//            $res->execute();
//        }
//    }
//}