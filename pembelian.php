<?php
session_start();
require "database.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["beli"])) {
    $id_barang = $_POST["idBarang"];
    $pembeli = $_POST["pembeli"];
    $jumlah_pembelian = $_POST["jumlahPembelian"];
    global $hasil;
    $hasil = cari_barang($id_barang, $jumlah_pembelian, $_SESSION["admin"]["id"]);
    if (is_array($hasil)) {
        header("Location: detail_pembelian.php?id_barang=$id_barang&pembeli=$pembeli&jumlah=$jumlah_pembelian");
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
    <div class="mt-2 d-block mh-auto" id="container">
        <div class="bg-light row rounded">
            <div class="container-fluid px-5 py-2">
                <h2 class="text-center my-3">Pembelian Barang</h2>
                <hr>
                <div class="bg-light row rounded">
                    <form action="" method="post" class="text-center form-check row border-dark">
                        <label class="h3" for="idBarang">Masukkan ID Produk</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="number" name="idBarang" id="idBarang"
                               required>
                        <br>
                        <label class="h3" for="pembeli">Pembeli</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="text" name="pembeli" id="pembeli"
                               required>
                        <br>
                        <label class="h3" for="jumlahPembelian">Masukkan Jumlah Pembelian</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="number" name="jumlahPembelian" required
                               id="jumlahPembelian">
                        <br>
                        <?php if (isset($_POST["beli"])) : ?>
                            <div class="text-center mb-2"><?= $hasil ?></div>
                        <?php endif; ?>
                        <input class="btn btn-primary w-50 mx-auto mb-4" type="submit" id="beli" name="beli"
                               value="Beli">
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>