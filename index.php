<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'function.php';
$produk = Select("SELECT * FROM produk");

if (isset($_POST["cari"])){
    $produk = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Customer</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style-index.css">
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="mt-2 mb-3">Daftar Produk</h1>
            <div class="link-container mb-3">
                <div>
                    <a href="tambah.php" class="btn btn-primary mr-2">Tambah</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
                <form action="" method="post" class="form-inline">
                    <input type="text" name="keyword" placeholder="Masukkan nama produk yang ingin dicari..." class="form-control mr-2">
                    <button type="submit" name="cari" class="btn btn-info">Cari</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($produk as $row): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <a href="update.php?ID=<?php echo $row["ID"]; ?>" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="hapus.php?ID=<?php echo $row["ID"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                            </td>
                            <td><?php echo $row["Kategori"]; ?></td>
                            <td><?php echo $row["Nama"]; ?></td>
                            <td><?php echo $row["Harga"]; ?></td>
                            <td><img src="img/<?php echo $row["Foto"]; ?>" alt="<?php echo $row["Nama"]; ?>" class="product-image" style="max-width: 100px;"></td>
                            <td><?php echo $row["Stok"]; ?></td>
                        </tr>
                    <?php endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery (for dropdowns, etc) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
