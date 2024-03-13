<?php 
session_start();
require 'function.php';

$id = $_GET["ID"];

$produk = select("SELECT * FROM produk WHERE id = $id")[0];

if (isset ($_POST["Submit"])){
    if ( update ($_POST)>0) {
        echo "
        <script>
            alert ('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert ('data gagal diubah!');
            document.location.href = 'index.php';
        </script>
    ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style-update.css">
    <title>Update Data Barang</title>
</head>
<body>
    <h1>Update Data Barang</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name ="ID"
        value = "<?= $produk["ID"]; ?>">

        <input type="hidden" name ="FotoLama"
        value = "<?= $produk["Foto"]; ?>">
        <ul>
            <li>
                <label for="Kategori">Kategori :</label>
                <input type="text" name="Kategori" id="Kategori"
                required
                value = "<?= $produk["Kategori"]; ?>">
            </li>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama"
                required
                value = "<?= $produk["Nama"];?>">
            </li>            
            <li>
                <label for="Harga">Harga :</label>
                <input type="text" name="Harga" id="Harga"
                required
                value = "<?= $produk["Harga"];?>">
            </li>            
            <li>
                <label for="Foto">Foto :</label>
                <img src="img/<?= $produk ['Foto']; ?>" width= "40"> <br>
                <input type="file" name="Foto" id="Foto">
            </li>
            <li>
                <label for="Stok">Stok :</label>
                <input type="text" name="Stok" id="Stok"
                required
                value = "<?= $produk["Stok"];?>">
            </li>
            <li>
                <button type = "Submit" name= "Submit">Update Data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>