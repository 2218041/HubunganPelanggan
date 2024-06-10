<?php
$servername = "localhost"; // Ubah jika server database Anda berbeda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "boni"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$contactInfo = $_POST['contactInfo'];
$customerInteraction = $_POST['customerInteraction'];
$satisfactionScore = $_POST['satisfactionScore'];
$effortScore = $_POST['effortScore'];
$trendAnalysis = $_POST['trendAnalysis'];

// Buat query
$sql = "INSERT INTO analisis (informasi_kontak_pelanggan, interaksi_dengan_pelanggan, skor_kepuasan_pelanggan, skor_customer_effort, analisis_trend) 
        VALUES ('$contactInfo', '$customerInteraction', '$satisfactionScore', '$effortScore', '$trendAnalysis')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect kembali ke halaman utama atau halaman lain
header("Location: index.php");
exit();
?>
