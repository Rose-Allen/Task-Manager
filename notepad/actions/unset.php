<?php
require_once "../db/connect.php";
$id = $_GET['id'];
debug($id);
$sql = "DELETE FROM `card` WHERE `card`.`id` = $id";
$res = $pdo->prepare($sql);
$res->execute([$id]);
header("Location: ../profile.php");