<?php

$connect = mysqli_connect("localhost", "root", "", "onlinestore");

function Select($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}

function tambah($data)
{
    global $connect;

    $Kategori = htmlspecialchars($data["Kategori"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Harga = htmlspecialchars($_POST["Harga"]);
    $Foto = upload();
    if (!$Foto) {
        return false;
    }

    $Stok = htmlspecialchars($_POST["Stok"]);

    $queryInsert = "INSERT INTO Produk VALUES
                ('', '$Kategori', '$Nama', '$Harga', '$Foto', '$Stok')
                ";
    mysqli_query($connect, $queryInsert);

    return mysqli_affected_rows($connect);
}


function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM produk WHERE id = $id");

    return mysqli_affected_rows($connect);
}

function update($data)
{
    global $connect;

    $id = $data["ID"];
    $Kategori = htmlspecialchars($data["Kategori"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Harga = htmlspecialchars($_POST["Harga"]);
    $FotoLama = htmlspecialchars($data["FotoLama"]);
    $Foto = htmlspecialchars($_POST["Foto"]);
    $Stok = htmlspecialchars($_POST["Stok"]);


    if ($_FILES['Foto']['error'] === 4) {
        $Foto = $FotoLama;
    } else {
        $Foto = upload();
    }
    
    $queryUpdate = "UPDATE Produk SET
                Kategori = '$Kategori',
                Nama = '$Nama',
                Harga = '$Harga',
                Foto = '$Foto',
                Stok = '$Stok'
                WHERE id = '$id'
              ";
    mysqli_query($connect, $queryUpdate);

    return mysqli_affected_rows($connect);
}

function cari($keyword)
{
    $select = "SELECT * FROM produk
                WHERE
                kategori LIKE '%$keyword%' OR
                nama LIKE '%$keyword%'                
                ";
    return select($select);
}

function upload()
{
    $namaFile = $_FILES['Foto']['name'];
    $ukuranFile = $_FILES['Foto']['size'];
    $error = $_FILES['Foto']['error'];
    $tmpName = $_FILES['Foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert ('Pilih gambar terlebih dahulu!');
                </script>";

        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
    alert ('Yang anda masukkan bukan gambar!');
    </script>";

        return false;
    }


    if ($ukuranFile > 1000000) {
        echo "<script>
    alert ('Ukuran gambar terlalu besar!');
    </script>";

        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
function registrasi($data)
{
    global $connect;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($connect, $data["konfirmasi_password"]);

    $result = mysqli_query($connect, "SELECT username FROM user WHERE username= '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert ('username sudah terdaftar!')
                </script>";
        return false;
    }

    if ($password !== $konfirmasi_password) {
        echo "<script>
                alert ('konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($connect);

}
?>