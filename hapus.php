<?php
session_start();
require "database.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$barang = cari_data($_GET["id"]);
if (isset($_POST["hapus"])) {
    $hapus = hapus($_GET["id"]);
    if ($hapus === true) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/font-background.css">
</head>
<body class="m-2">
<div class="container my-3">
    <div class="sticky-top fixed-top">
        <div class="navbar navbar-light bg-light row rounded">
            <div class="container-fluid">
                <a href="index.php" class="text-decoration-none">
                    <div class="align-middle">
                        <h1 class="fw-bold navbar-brand m-auto">Warehouse</h1>
                    </div>
                </a>
                <span class="d-flex">
                    <table>
                        <tr>
                            <td>
                                <a href="pembelian.php" class="d-inline">
                                    <button class="btn btn-outline-primary w-auto me-2 col-2"
                                            type="button">Penjualan</button>
                                </a>
                            </td>
                            <td>
                                <a href="riwayat_pembelian.php" class="d-inline">
                                    <button class="btn btn-outline-primary w-auto me-2 col-2"
                                            type="button">Riwayat Penjualan</button>
                                </a>
                            </td>
                            <td>
                                <a href="tambah.php" class="d-inline">
                                    <button class="btn btn-outline-primary w-auto me-2 col-2"
                                            type="button">Tambah Barang</button>
                                </a>
                            </td>
                            <td>
                                <a href="login.php">
                                    <button class="btn btn-outline-danger w-auto me-2 col-2"
                                            type="button">Keluar</button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </span>
            </div>
        </div>
    </div>
    <div class="mt-2 d-block mh-auto">
        <div class="bg-light row rounded">
            <div class="container-fluid px-5 py-2">
                <h2 class="text-center my-3">Hapus Barang</h2>
                <hr>
                <div class="text-center">Hapus Barang dengan ID <?= $_GET["id"] ?> ? </div>
                <div class="text-center">Nama Barang adalah <?= $barang['nama'] ?> </div>
                <hr>
            </div>
            <form action="" method="post">  
            <div class="container">
                    <div class="col-md-12 text-center">
                        <input class="btn btn-primary w-75 rounded-pill translate-middle-y mt-3 text-center"
                               id="hapus" name="hapus" type="submit"
                               value="Hapus">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script crossorigin="anonymous"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts/search.js"></script>
</body>
</html>