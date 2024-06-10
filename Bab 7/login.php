<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'boni');
    
    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    // Validasi pengguna dari database
    $stmt = $conn->prepare("SELECT user_id, password_hash FROM userweb WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            // Set session
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;
            
            // Set cookie jika "Ingat Aku" dipilih
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 30 hari
            }
            
            // Redirect ke halaman aman
            header("Location: admin.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
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
