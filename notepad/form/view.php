<?php
require_once "../db/connect.php";
require_once "../assets/header.php";
require_once "../assets/navbar.php";
$id = $_GET['id'];
debug($id);

$sql = "SELECT * FROM `card` WHERE id=$id";
$res = $pdo->query($sql);
$contents = $res->fetchAll();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($contents as  $content):?>
                <img src="../upload/<?=$content['img']?>" style="width: 200px" alt="">
                <h1><?=$content['title']?></h1>
                <p><?=$content['description']?></p>
            <?php endforeach; ?>
        </div>


    </div>
</div>

<?php
require_once "../assets/footer.php";
?>
