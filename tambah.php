<?php 

require 'function.php';

if (isset ($_POST["Submit"])){
    if ( tambah ($_POST)>0) {
        echo "
        <script>
            alert ('data masuk!');
            document.location.href = 'index.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert ('data gagal masuk!');
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
    <link rel="stylesheet" type="text/css" href="style-tambah.css">
    <title>Tambah Data Barang</title>
</head>
<body>
    <h1>Tambah Data Barang</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Kategori">Kategori :</label>
                <input type="text" name="Kategori" id="Kategori"
                required>
            </li>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama"
                required>
            </li>            
            <li>
                <label for="Harga">Harga :</label>
                <input type="text" name="Harga" id="Harga"
                required>
            </li>            
            <li>
                <label for="Foto">Foto :</label>
                <input type="file" name="Foto" id="Foto"
                required>
            </li>
            <li>
                <label for="Stok">Stok :</label>
                <input type="text" name="Stok" id="Stok"
                required>
            </li>
            <li>
                <button type = "Submit" name= "Submit">Tambah Data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>