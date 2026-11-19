<?php
include_once __DIR__ . "/koneksi.php";

if (!isset($koneksi)) {
    die("Variabel koneksi tidak ditemukan!");
}

if (!$koneksi) {
    die("Koneksi database gagal!");
}

$query = mysqli_query($koneksi, "SELECT * FROM produk");

if (!$query) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<div class="col-md-10 p-4">

    <h2>Dashboard</h2>
    <hr>

    <h4 class="mb-3">Data Produk</h4>

    <a href="tambah.php" class="btn btn-primary btn-sm mb-3">
        <i class="bi bi-plus-lg"></i> Add Product
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;

                while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                    <td>Rp<?= number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td><?= $data['stok']; ?></td>

                    <td>
                        <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>

        </table>
    </div>

</div>