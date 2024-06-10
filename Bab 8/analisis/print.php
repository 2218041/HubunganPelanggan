<?php
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "boni"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM analisis"; // Query untuk mengambil data dari tabel analisis
$result = $conn->query($sql);

// Membuat objek Dompdf
$dompdf = new Dompdf();

// Mengatur HTML yang akan dicetak
$html = "<html><body>";
$html .= "<h1>Analisis Kepuasan Pelanggan</h1>";
$html .= "<table border='1' cellspacing='0' cellpadding='10'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>ID</th>";
$html .= "<th>Informasi Kontak Pelanggan</th>";
$html .= "<th>Interaksi dengan Pelanggan</th>";
$html .= "<th>Skor Kepuasan Pelanggan</th>";
$html .= "<th>Skor Customer Effort</th>";
$html .= "<th>Analisis Trend</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        $html .= "<td>" . htmlspecialchars($row["ID"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["informasi_kontak_pelanggan"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["interaksi_dengan_pelanggan"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["skor_kepuasan_pelanggan"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["skor_customer_effort"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["analisis_trend"]) . "</td>";
        $html .= "</tr>";
    }
} else {
    $html .= "<tr><td colspan='6'>Tidak ada data</td></tr>";
}

$html .= "</tbody>";
$html .= "</table>";
$html .= "</body></html>";

// Memasukkan HTML ke Dompdf
$dompdf->loadHtml($html);

// Mengatur ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');

// Render PDF
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("analisis_kepuasan_pelanggan.pdf", array("Attachment" => false));

// Tutup koneksi database
$conn->close();
?>
