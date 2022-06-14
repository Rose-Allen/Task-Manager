<?php
session_start();
require_once "assets/header.php";
require_once "assets/navbar.php";
require_once "db/connect.php";
$id = $_SESSION['id'];
$sql = "SELECT * FROM `card` WHERE user_id=$id";
$res = $pdo->query($sql);
$cards = [];
$i = 0;
while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    $cards[$i]['id'] = $row['id'];
    $cards[$i]['user_id '] = $row['user_id '];
    $cards[$i]['title'] = $row['title'];
    $cards[$i]['description'] = $row['description'];
    $cards[$i]['img'] = $row['img'];
    $i++;
}


//$cards = [];
//$i=0;
//while ($row = $res->fetch(PDO::FETCH_ASSOC)){
//    $card['id'] = $row['id'];
//    $card['user_idk'] = $row['user_idk'];
//    $card['title'] = $row['title'];
//    $card['description'] = $row['description'];
//    $card['img'] = $row['img'];
//
//}

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['username'])):?>
                <div class="text-center content">
                    <h1>Добро пожаловать, <span class="normal"><?php echo $_SESSION['username']?></span></h1>
                    <a class="btn btn-primary mt-3" href="form/create_form.php">Добавить запись</a>
                </div>
                <?php elseif(isset($_COOKIE['flag'])):?>
                    <div class="text-center content">
                        <h1>Добро пожаловать, <span class="normal"><?php echo $_COOKIE['name']?></span></h1>
                        <a class="btn btn-primary mt-3" href="form/create_form.php">Добавить запись</a>
                    </div>
                <?php else:?>
                    <h2>Вы не авторизированы</h2>
                <?php endif;?>
                <?php if (isset($_SESSION['username'])):?>
                    <div class="row mt-3">
                    <?php foreach ($cards as $card): ?>
                    <div class="col-md-4">
                        <div class="card" style="width: 20rem;">
                            <img src="upload/<?php echo $card['img']?>" class="card-img-top  justify-content-center align-items-center"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $card['title']?></h5>
                                <p class="card-text"><?php echo $card['description']?></p>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="form/view.php?id=<?=$card['id']?>" class="btn btn-success btn-sm">Подробнее</a>
                                    <a href="form/edit_form.php?id=<?=$card['id']?>" class="btn  btn-warning btn-sm">Редактировать</a>
                                    <a href="actions/unset.php?id=<?=$card['id']?>" class="btn btn-danger btn-sm">Удалить</a>
<!--                                    <a href="actions/delete.php" class="btn btn-danger btn-sm">Удалить</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <?php elseif($_COOKIE['name']):?>
                    <div class="row mt-3">
                        <?php foreach ($cards as $card): ?>
                            <div class="col-md-4">
                                <div class="card" style="width: 20rem;">
                                    <img src="upload/<?php echo $card['img']?>" class="card-img-top  justify-content-center align-items-center"  alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $card['title']?></h5>
                                        <p class="card-text"><?php echo $card['description']?></p>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="form/view.php?id=<?=$card['id']?>" class="btn btn-success btn-sm">Подробнее</a>
                                            <a href="form/edit_form.php?id=<?=$card['id']?>" class="btn  btn-warning btn-sm">Редактировать</a>
                                            <a href="actions/unset.php?id=<?=$card['id']?>" class="btn btn-danger btn-sm">Удалить</a>
                                            <!--                                    <a href="actions/delete.php" class="btn btn-danger btn-sm">Удалить</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php else:?>
                    <a href="form/login_form.php" class="btn btn-info">Войти</a>
                <?php endif;?>
            </div>


        </div>
    </div>

<?php
require_once "assets/footer.php";
?>