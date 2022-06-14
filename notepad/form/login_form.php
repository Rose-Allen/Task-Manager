<?php
session_start();
require_once "../assets/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="size d-flex justify-content-center align-items-center vh-100">
                <form class="border" action="../login.php" method="post">
                    <?php if (isset($_SESSION['isset_user_auth']) or $_SESSION['error']): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['isset_user_auth']?>
                            <?php echo $_SESSION['error']?>
                            <?php unset($_SESSION['isset_user_auth'])?>
                            <?php unset($_SESSION['error'])?>
                        </div>
                    <?php endif;?>
                    <div class="form-group mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label  class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label" >Запомнить меня!</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn">Войти</button>

<!--                    <div class="input-group mt-3">-->
<!--                        <p class="input-group-text">Если у вас нет аккаунт</p>-->
<!--                      <a class="btn btn-primary " href="register_form.php  ">Зарегистрироваться</a>-->
<!--                    </div>-->
                    <div class="text-center mt-3">
                        <p>У вас нет аккаунта? <a class="" href="register_form.php">Регистрация</a></p>
                    </div>
                </form>


            </div>

        </div>
    </div>

</div>
<!--    <div class="row text-center d-flex justify-content-center align-items-center vh-100">-->
<!--        -->
<!--    </div>-->


<?php
require_once "../assets/footer.php";
?>
