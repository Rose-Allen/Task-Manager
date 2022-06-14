<?php
session_start();
require_once "../assets/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="size d-flex justify-content-center align-items-center vh-100">
                <form class="border" action="../register.php" method="post">
                    <?php if (isset($_SESSION['isset_email']) or $_SESSION['error']): ?>
                        <div class="alert alert-danger" role="alert">
                           <?php echo $_SESSION['isset_email']?>
                           <?php echo $_SESSION['error']?>
                            <?php unset($_SESSION['isset_email'])?>
                           <?php unset($_SESSION['error'])?>
                        </div>
                    <?php endif;?>
                    <div class="form-group mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Имя</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group mb-3">
                        <label  class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn">Регистрация</button>
                    <div class="text-center mt-3">
                        <p>У вас есть аккаунта: <a class="" href="login_form.php">Войти</a></p>
                    </div>

                </form>


            </div>

        </div></div>

</div>
<!--    <div class="row text-center d-flex justify-content-center align-items-center vh-100">-->
<!--        -->
<!--    </div>-->


<?php
require_once "../assets/footer.php";
?>
