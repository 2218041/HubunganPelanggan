<?php
// register.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Periksa apakah password dan konfirmasi password cocok
    if ($password == $confirm_password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'boni');
        
        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }
        
        // Masukkan data ke database
        $stmt = $conn->prepare("INSERT INTO userweb (username, password_hash, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_lengkap, $hashed_password, $email);
        
        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
        } else {
            echo "Registrasi gagal: " . $stmt->error;
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo "Password dan konfirmasi password tidak cocok!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style/register.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <form action="register.php" method="post">
            <h1>Daftar Akun Baru</h1>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required />
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required />
                    <i class="bx bxl-gmail"></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" required />
                    <i class="bx bx-lock"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required />
                    <i class="bx bx-lock"></i>
                </div>
            </div>
            <label><input type="checkbox" required /> Dengan ini saya menyatakan bahwa informasi di atas benar dan tepat</label>
            <button type="submit" class="btn">Register</button>
        </form>
        <button class="btn"><a href="login.php">Login</a></button>
    </div>
</body>
</html>
