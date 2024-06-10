<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "boni";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID analisis dari URL
$id = $_GET['id'];

// Periksa apakah ID telah diterima dari URL
if (!isset($id)) {
    // Jika tidak, redirect kembali ke halaman analisis.php
    header("Location: analisis.php");
    exit;
}

// Ambil data analisis dari database berdasarkan ID
$sql = "SELECT * FROM analisis WHERE ID = '$id'"; // Perhatikan penggunaan tanda kutip
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Data ditemukan, ambil baris data
    $row = $result->fetch_assoc();
} else {
    // Data tidak ditemukan, redirect kembali ke halaman analisis.php
    header("Location: analisis.php");
    exit;
}

// Persiapkan variabel $stmt
$stmt = null;

// Proses form jika POST request diterima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $informasi_kontak_pelanggan = $_POST['informasi_kontak_pelanggan'];
    $interaksi_dengan_pelanggan = $_POST['interaksi_dengan_pelanggan'];
    $skor_kepuasan_pelanggan = $_POST['skor_kepuasan_pelanggan'];
    $skor_customer_effort = $_POST['skor_customer_effort'];
    $analisis_trend = $_POST['analisis_trend'];

    // Update data di database
    $sql_update = "UPDATE analisis SET informasi_kontak_pelanggan=?, interaksi_dengan_pelanggan=?, skor_kepuasan_pelanggan=?, skor_customer_effort=?, analisis_trend=? WHERE ID=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssiss", $informasi_kontak_pelanggan, $interaksi_dengan_pelanggan, $skor_kepuasan_pelanggan, $skor_customer_effort, $analisis_trend, $id);

    // Eksekusi statement jika sudah didefinisikan
    if ($stmt !== null && $stmt->execute()) {
        // Jika update berhasil, redirect kembali ke halaman analisis.php
        header("Location: analisis.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Tutup statement jika sudah didefinisikan
    if ($stmt !== null) {
        $stmt->close();
    }
}

// Tutup koneksi database
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Head content -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
<div class="sidebar">
      <!-- Sidebar code -->
      <div class="logo"></div>
      <ul class="menu">
        <li>
          <!-- 3 -->
          <a href="../admin.php">
            <i class="bx bxs-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-folder"></i>
            <span>Manajemen Kontak</span>
          </a>
        </li>
        <li>
          <a href="input.php">
            <i class="bx bx-notepad"></i>
            <span>Input Data</span>
          </a>
        </li>
        <li class="active">
          <a href="../analisis/analisis.php">
            <i class="bx bxs-package"></i>
            <span>Analisis Kepuasan Pelanggan</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-log-out"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>Edit Data</span>
                <span>Dashboard</span>
            </div>
            <div class="user-info">
                <div class="search">
                    <i class="bx bx-search-alt"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="../image/government64px.png" alt="">
            </div>
        </div>
        <div class="tabel-wrapper">
            <h3 class="main-title">Edit Data</h3>
            <div class="form-wrapper">
                <!-- Form untuk pengeditan data -->
    <form action="" method="post">
        <div class="form-group">
            <label for="informasi_kontak_pelanggan">Informasi Kontak Pelanggan</label>
            <textarea id="informasi_kontak_pelanggan" name="informasi_kontak_pelanggan" rows="4"><?php echo $row["informasi_kontak_pelanggan"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="interaksi_dengan_pelanggan">Interaksi dengan Pelanggan</label>
            <textarea id="interaksi_dengan_pelanggan" name="interaksi_dengan_pelanggan" rows="4"><?php echo $row["interaksi_dengan_pelanggan"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="skor_kepuasan_pelanggan">Skor Kepuasan Pelanggan</label>
            <input type="text" id="skor_kepuasan_pelanggan" name="skor_kepuasan_pelanggan" value="<?php echo $row["skor_kepuasan_pelanggan"]; ?>">
        </div>
        <div class="form-group">
            <label for="skor_customer_effort">Skor Customer Effort</label>
            <input type="text" id="skor_customer_effort" name="skor_customer_effort" value="<?php echo $row["skor_customer_effort"]; ?>">
        </div>
        <div class="form-group">
            <label for="analisis_trend">Analisis Trend</label>
            <textarea id="analisis_trend" name="analisis_trend" rows="4"><?php echo $row["analisis_trend"]; ?></textarea>
</div>
<button type="submit">Simpan Perubahan</button>
</form>
        </div>
    </div>
</div>
</body>
</html>
