<?php 
    session_start();
    require 'function.php';

    if (isset ($_COOKIE['id']) && isset ($_COOKIE ['key'])) {
      $id = $_COOKIE ['id'];
      $key = $_COOKIE ['key'];
    

    $result = mysqli_query($connect, "SELECT username FROM user WHERE id =$id");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }


}

    if (isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["login"])){

        $username= $_POST["username"];
        $password= $_POST["password"];

        $result2 = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username'");
        if (mysqli_num_rows($result2)===1){
            $row2 = mysqli_fetch_assoc($result2);
            if (password_verify($password, $row2["password"])){
                $_SESSION["login"]=true;
                
                if (isset ($_POST['remember'])){
                    setcookie ('id', $row2['id'], time()+60);
                    setcookie ('key', hash('sha256', $row['username'], time()+60));
                }

                header("Location: admin.php");
                exit;
            } 
        } 

        $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
                $_SESSION["login"]=true;
                
                if (isset ($_POST['remember'])){
                    setcookie ('id', $row['id'], time()+60);
                    setcookie ('key', hash('sha256', $row['username'], time()+60));
                }

                header("Location: index.php");
                exit;
            } 
        } 

        $error = true;
        
    }
    
    if (isset($error)):
        echo "
            <script>
            alert ('Username atau Password Anda salah!');
            </script>
            ";
    endif; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style-login.css">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <form action="" method="post">
    <div class="container">

        <ul>
            <li class= list>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
            </li>

            <li class = list>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
            </li>

            <li class="remember">
                <label for="Remember">
                    <input type="checkbox" name="remember" id="remember">Remember Me 
                </label>
            </li>

            <li>
                <button type="submit" name="login" class= loginbtn>Login</button>
            </li>
            <p>Belum punya akun? <a href="registrasi.php">Daftar disini</a></p>
        </ul>
    </div>
    </form>
</body>
</html>