
<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id'");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit;
}
?>
