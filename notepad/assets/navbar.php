<?php
session_start();
?>
<?php if (isset($_SESSION['username'])):?>
<nav class="navbar navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand" href="../profile.php">
            <img src="../img/logo.png" alt="logo" width="50" height="50">
        </a>
        <form class="d-flex" method="post" action="../actions/logout.php">
            <button class="btn btn-danger" type="submit">Log Out</button>
        </form>
    </div>
</nav>
<?php elseif (isset($_COOKIE['name'])):?>
    <nav class="navbar navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../profile.php">
                <img src="../img/logo.png" alt="logo" width="50" height="50">
            </a>
            <form class="d-flex" method="post" action="../actions/logout.php">
                <button class="btn btn-danger" type="submit">Log Out</button>
            </form>
        </div>
    </nav>
<?php else:?>
    <nav class="navbar navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../profile.php">
                <img src="../img/logo.png" alt="logo" width="50" height="50">
            </a>
        </div>
    </nav>
<?php endif;?>