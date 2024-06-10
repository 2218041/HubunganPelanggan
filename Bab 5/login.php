<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Validasi pengguna (contoh sederhana, sebaiknya ganti dengan validasi ke database)
    $valid_username = "boni";
    $valid_password = "test";
    
    if ($username == $valid_username && $password == $valid_password) {
        // Set session
        $_SESSION['username'] = $username;
        
        // Set cookie jika "Ingat Aku" dipilih
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + (86400 * 30), "/"); // 30 hari
        }
        
        // Redirect ke halaman aman
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style/login.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <?php
            if (isset($error)) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class="bx bx-user-circle"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required />
                <i class="bx bx-lock-alt"></i>
            </div>

            <div class="remember-forget">
                <label for="">
                    <input type="checkbox" name="remember" />
                    Ingat Aku
                </label>
                <a href="">Lupa Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Belum punya akun? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
