<?php
session_start();
require "database.php";
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$id_barang = (int)$_GET["id_barang"];
$pembeli = $_GET["pembeli"];
$jumlah = intval($_GET["jumlah"]);
$harga = harga_barang($jumlah);
$jumlah_pembayaran = $jumlah * $harga;
var_dump($harga);
global $hasil;
if (isset($_POST["bayar"])) {
    $hasil = beli_barang($id_barang, $pembeli, $jumlah, $_SESSION["admin"]["id"]);
}
?>
<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pembelian</title>
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
                                            type="button">Pembelian</button>
                                </a>
                            </td>
                            <td>
                                <a href="riwayat_pembelian.php" class="d-inline">
                                    <button class="btn btn-outline-primary w-auto me-2 col-2"
                                            type="button">Riwayat Pembelian</button>
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
                        <label class="h3" for="idBarang">ID Produk</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="number" name="idBarang" id="idBarang"
                               readonly value="<?= $id_barang ?>" style="text-align: center">
                        <br>
                        <label class="h3" for="pembeli">Pembeli</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="text" name="pembeli" id="pembeli"
                               readonly value="<?= $pembeli ?>" style="text-align: center">
                        <br>
                        <label class="h3" for="jumlahPembelian">Jumlah</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="number" name="jumlahPembelian" readonly
                               id="jumlahPembelian" value="<?= $jumlah ?>" style="text-align: center">
                        <br>
                        <label class="h3" for="harga">Harga</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="number" name="harga" id="harga"
                               readonly value="<?= $harga ?>" style="text-align: center">
                        <br>
                        <label class="h3" for="jumlahPembayaran">Jumlah Pembayaran</label>
                        <br>
                        <input class="form-control w-50 mx-auto" type="number" name="jumlahPembayaran"
                               id="jumlahPembayaran" readonly value="<?= $jumlah_pembayaran ?>"
                               style="text-align: center">
                        <br>
                        <?php if (isset($_POST["bayar"])) : ?>
                            <?php if ($hasil !== true) : ?>
                                <div class="text-center mb-2"><?= $hasil ?></div>
                            <?php else : ?>
                                <div class="text-center mb-2">Pembelian Berhasil</div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <input class="btn btn-primary w-50 mx-auto mb-4" type="submit" id="bayar" name="bayar"
                               value="Bayar">
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