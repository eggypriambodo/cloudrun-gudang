<?php
session_start();
require "database.php";
$barang = barang($_SESSION["admin"]["id"]);

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
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
            <div class="container-fluid">
                <table class="table rounded mx-auto">
                <thead>
                    <tr>
                        <th colspan="8" class="text-center">Daftar Barang</th>
                    </tr>
                    </thead>        
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%">ID</th>
                        <th>Nama</th>
                        <th class="text-end" style="width: 10%">Stok</th>
                        <th class="text-end" style="width: 16%">Harga Satuan (Rp)</th>
                        <th class="text-end" style="width: 15%">Harga Total (Rp)</th>
                        <th class="text-center" style="width: 17%">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!$barang) {
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Kosong</td>
                        </tr>
                        <?php
                    } else {
                        foreach ($barang as $item) {
                            ?>
                            <tr>
                                <td class="text-center align-middle" style="width: 6%"><?= $item["id"] ?></td>
                                <td class="align-middle"><?= $item["nama"] ?></td>
                                <td class="text-end align-middle" style="width: 10%"><?= $item["stok"] ?></td>
                                <td class="text-end align-middle" style="width: 16%"><?= $item["harga"] ?></td>
                                <td class="text-end align-middle" style="width: 15%"><?= $item["total"] ?></td>
                                <td class="text-center align-middle" style="width: 17%">
                                    <a href="ubah.php?id=<?= $item["id"]?>"
                                       class="text-decoration-none">
                                        <button class="btn btn-outline-primary w-auto" type="submit">
                                            Ubah
                                        </button>
                                    </a>
                                    <a href="hapus.php?id=<?= $item["id"]?>"
                                       class="text-decoration-none">
                                        <button class="btn btn-outline-danger w-auto" type="submit">
                                            Hapus
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>