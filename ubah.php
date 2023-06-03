<?php
session_start();
require "database.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$barang = cari_data($_GET["id"]);
if (isset($_POST["ubah"])) {
    $hasil = ubah( $_GET["id"],
    $_POST["nama"],
    $_POST["stok"],
    $_POST["harga"],
    );

    var_dump($hasil);

    echo "\n;";
    if ($hasil === true) {
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
                <h2 class="text-center my-3">ID Barang</h2>
                <hr>
                <h2 class="text-center"><?= $_GET["id"] ?></h2>
                <hr>
            </div>
            <form action="" method="post" class="px-5 con">
    
                <h2 class="text-center my-3">Data Barang</h2>
                <hr>
                <div class="form-group row align-content-center my-3">
                    <label for="nama" class="col-sm-2 col-form-label col-form-label-lg">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" value="<?= $barang['nama'] ?>"
                               id="nama" required name="nama">
                    </div>
                </div>
                <div class="form-group row align-content-center mb-3">
                    <label for="stok" class="col-sm-2 col-form-label col-form-label-lg">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" value="<?= $barang['stok'] ?>"
                               id="stok" required name="stok">
                    </div>
                </div>
                <div class="form-group row align-content-center mb-3">
                    <label for="harga" class="col-sm-2 col-form-label col-form-label-lg">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" value="<?= $barang['harga'] ?>"
                               id="harga" required name="harga">
                    </div>
                </div>
                <div class="form-group row align-content-center mb-3">
                    <label for="total" class="col-sm-2 col-form-label col-form-label-lg">Total</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" value="<?= $barang['total'] ?>"
                               id="total" required name="total">
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="col-md-12 text-center">
                        <input class="btn btn-primary w-75 rounded-pill translate-middle-y mt-3 text-center"
                               id="ubah" name="ubah" type="submit"
                               value="Ubah">
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