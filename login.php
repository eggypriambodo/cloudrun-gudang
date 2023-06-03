<?php
session_start();
session_destroy();

require "database.php";
if (isset($_POST["login"])) {
    $login = login($_POST["nama_pengguna"], $_POST["kata_sandi"]);
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/login-signup.css">
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle bg-white rounded p-lg-4">
    <h1 class="text-center fw-bold mx-">Warehouse</h1>
    <hr class="mx-2">
    <h2 class="text-center mx-2">Login</h2>
    <hr class="mx-2">
    <form action="" method="post">
        <div class="mb-3 mx-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="nama_pengguna" id="namaPengguna" required>
        </div>
        <div class="mb-3 mx-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="kata_sandi" id="kataSandi" required>
        </div>
        <div class="mx-2">
            <button type="submit" class="btn btn-primary w-100 rounded-pill mb-3" name="login">Login</button>
        </div>
    </form>
    <?php if (isset($login)) : ?>
        <div class="text-center"><?= $login ?></div>
    <?php endif; ?>
    <div class="text-center">Not a member? <a href="signup.php">Sign up</a></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/ajax.js"></script>
</body>
</html>