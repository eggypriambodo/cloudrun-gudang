<?php
session_start();
require "database.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["tambahData"])) {
    tambah($_SESSION["admin"]["id"],$_POST["nama"], $_POST["stok"], $_POST["harga"]);
    header("Location: index.php");
    exit();
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
    <div class="mt-2 d-block mh-auto" id="container">
        <div class="bg-light row rounded">
            <div class="container-fluid px-5 py-2">
                <form class="px-5" action="" method="post">
                    <h2 class="text-center my-3">Tambah Daftar Stok Barang</h2>
                    <hr>
                    <div class="form-group row align-content-center my-3">
                        <label for="nama" class="col-sm-2 col-form-label col-form-label-lg">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group row align-content-center mb-3">
                        <label for="stok" class="col-sm-2 col-form-label col-form-label-lg">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" id="stok" name="stok">
                        </div>
                    </div>
                    <div class="form-group row align-content-center mb-3">
                        <label for="harga" class="col-sm-2 col-form-label col-form-label-lg">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" id="harga" name="harga">
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="col-md-12 text-center">
                            <input class="btn btn-primary w-75 rounded-pill translate-middle-y mt-3 text-center"
                                   id="tambahData" name="tambahData" type="submit"
                                   value="Tambah Data">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="scripts/search.js"></script>
</body>
</html>