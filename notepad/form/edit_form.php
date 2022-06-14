<?php
session_start();
require_once "../db/connect.php";
require_once "../assets/header.php";
require_once "../assets/navbar.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `card` WHERE id=$id";
$res = $pdo->query($sql);
$contents = $res->fetchAll();
?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="size d-flex justify-content-center align-items-center vh-100">
                    <form class="border" action="../actions/update.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                        <?php if (isset($_SESSION['error']) or $_SESSION['message']): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['error']?>
                                <?php echo $_SESSION['message']?>
                                <?php unset($_SESSION['error'])?>
                                <?php unset($_SESSION['message'])?>
                            </div>
                        <?php endif;?>
                        <div class="form-group mb-3">
                            <label class="form-label">Заголовок</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $contents[0]['title']?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Описание</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?=$contents[0]['description']?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label  class="form-label">Изображение</label>
                            <input type="file" class="form-control" name="img">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn">Обновить</button>

                    </form>


                </div>

            </div></div>

    </div>




<?php
require_once "../assets/footer.php";
?>