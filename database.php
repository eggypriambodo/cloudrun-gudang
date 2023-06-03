<?php
$serverName = "34.124.156.172";
$userName = "root";
$password = "projecttcc";
$database = "warehouse-be";

$koneksi = mysqli_connect($serverName, $userName, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// memberikan validasi login
function login($namaPengguna, $kataSandi)
{
    global $koneksi;
    $query = "SELECT * FROM admin 
    WHERE nama_pengguna = '$namaPengguna' 
    AND kata_sandi = '$kataSandi'";
    $hasil = $koneksi->query($query);
    if ($hasil->num_rows > 0) {
        session_start();
        $_SESSION["admin"] = $hasil->fetch_assoc();
        $_SESSION["login"] = true;
        header("Location: index.php");
        exit();
    } else {
        return "Nama pengguna tidak terdaftar atau kata sandi salah";
    }
}

// mengambil data seluruh barang dengan id_admin sesuai parameter menjadi suatu array
function barang($id_admin)
{
    global $koneksi;
    $barang = array();
    $query = "SELECT * FROM barang WHERE id_admin = $id_admin";
    $hasil = $koneksi->query($query);
    if ($hasil->num_rows > 0) {
        while ($baris = $hasil->fetch_assoc()) {
            $barang[] = $baris;
        }
        return $barang;
    } else {
        return false;
    }
}

function tambah($id_admin, $nama, $stok, $harga)
{
    global $koneksi;
    $koneksi->query("INSERT INTO barang (id_admin, nama, stok, harga) values ($id_admin, '$nama', $stok, $harga)");
    if ($koneksi->error) {
        return "Gagal melakukan penyimpanan";
    } else {
        return true;
    }
}

function ubah($id_barang, $nama, $stok, $harga)
{
    global $koneksi;
    $koneksi->query("
            UPDATE barang
            SET nama     = '$nama',
                stok    = $stok,
                harga  = $harga
                WHERE id = $id_barang
    ");
    if ($koneksi->error) {
        return "Gagal melakukan penghapusan";
    } else {
        return true;
    }
}

function hapus($id_barang): bool
{
    global $koneksi;
    $koneksi->query("
        DELETE
        FROM barang
        WHERE id = $id_barang 
    ");
    if ($koneksi->error) {
        return "Gagal melakukan penghapusan";
    } else {
        return true;
    }
}

function harga_barang($id_barang)
{
    global $koneksi;
    $query = "
        SELECT *
        FROM barang
        WHERE id = $id_barang
    ";

    $hasil = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($hasil) > 0) {
        return (int)mysqli_fetch_assoc($hasil)["stok"];
    } else {
        return "Barang tidak tersedia";
    }
}

function cari_data($id_barang)
{
    global $koneksi;
    $query = "
        SELECT *
        FROM barang
        WHERE id = $id_barang
    ";
    $hasil = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($hasil) > 0) {
        return mysqli_fetch_assoc($hasil);
    } else {
        return "Pembelian tidak dapat dilakukan";
    }
}

function cari_barang($id_barang, $jumlah, $id_admin)
{
    global $koneksi;
    $query = "
        SELECT *
        FROM barang
        WHERE id = $id_barang
        AND stok > $jumlah
        AND id_admin = $id_admin
    ";
    $hasil = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($hasil) > 0) {
        return mysqli_fetch_assoc($hasil);
    } else {
        return "Pembelian tidak dapat dilakukan";
    }
}

function beli_barang($id_barang, $pembeli, $jumlah, $id_admin)
{
    global $koneksi;
    $barang = cari_barang($id_barang, $jumlah, $id_admin);
    $tambah_pembelian_query = "
        INSERT INTO penjualan (id_barang, pembeli, jumlah, id_admin)
        VALUES ($id_barang, '$pembeli', $jumlah, $id_admin)
    ";

    $kurangi_barang_query = "
        UPDATE barang SET stok = stok - $jumlah
    ";

    if (is_array($barang)) {
        mysqli_query($koneksi, $tambah_pembelian_query);
        mysqli_query($koneksi, $kurangi_barang_query);
        return true;
    } elseif (is_string($barang)) {
        return "Pembelian tidak dapat dilakukan";
    }
}

function riwayat_pembelian($id_admin)
{
    global $koneksi;
    $riwayat = array();
    $query = "
        SELECT penjualan.id,
               penjualan.id_barang,
               penjualan.pembeli,
               barang.nama,
               penjualan.jumlah,
               barang.harga,
               barang.harga * penjualan.jumlah AS total,
               penjualan.waktu
        FROM penjualan 
                INNER JOIN barang ON penjualan.id_barang = barang.id
        WHERE penjualan.id_admin = $id_admin;
    ";
    $hasil = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($hasil) > 0) {
        while ($baris = mysqli_fetch_assoc($hasil)) {
            $riwayat[] = $baris;
        }
        return $riwayat;
    } else {
        return "Riwayat Pembelian Kosong";
    }

}
