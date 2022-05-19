<?php
include "koneksi.php";

$query = "SELECT * FROM tb_barang";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sederhana | READ</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-3 text-center">Data Barang</h1>
        <a href="tambah.php" class="btn btn-success btn-sm mb-3">Tambah Barang</a>

        <table class="table table-sm table-bordered">
            <tr class="text-center fw-bold text-uppercase">
                <td>No</td>
                <td>Gambar</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Stok</td>
                <td>Aksi</td>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                
                // die();
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                    // var_dump($data['nama_barang']);
            ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><img src="gambar/<?= $data['gambar_barang'] ?>" alt="gabisa" width="200px"></td>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['kategori_barang'] ?></td>
                        <td>Rp. <?= $data['harga_beli'] ?></td>
                        <td>Rp. <?= $data['harga_jual'] ?></td>
                        <td><?= $data['stok'] ?></td>
                        <td class="text-center">
                            <a href="ubah.php?id_barang=<?= $data['id_barang'] ?>" class="btn btn-warning btn-sm mx-1">Edit</a>
                            
                            <a href="proses.php?id_barang=<?= $data['id_barang'] ?>&aksi=hapus" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $data['nama_barang'] ?> ?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="8" class="text-center">Data Kosong</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>