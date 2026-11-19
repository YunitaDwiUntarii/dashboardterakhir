
<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $update = mysqli_query($koneksi, "UPDATE produk SET
        nama_barang='$nama',
        harga='$harga',
        stok='$stok'
        WHERE id='$id'");

    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengubah produk: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Tatut Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card">
        <div class="card-header bg-dark text-white">
            Edit Produk
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang"
                        class="form-control"
                        value="<?= htmlspecialchars($data['nama_barang']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga"
                        class="form-control"
                        value="<?= $data['harga']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok"
                        class="form-control"
                        value="<?= $data['stok']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-warning">
                    Update
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
