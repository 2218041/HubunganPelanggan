<?php
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Kepuasan Pelanggan</title>
    <link rel="stylesheet" href="../style/analisis.css">
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
        <!-- Header code -->
        <div class="header-title">
          <span>Hubungiku</span>
          <span>Dashboard</span>
        </div>
        <div class="user-info">
          <div class="search">
            <i class="bx bx-search-alt"></i>
            <input type="text" placeholder="Search" />
          </div>
          <img src="../image/support.png" alt="" />
        </div>
      </div> 
      <div class="tabel-wrapper">
        <h3 class="main-title">Analisis Kepuasan Pelanggan</h3>
        <div class="button-container">
                <button class="move-button" onclick="window.location.href='print.php'">Print</button>
            </div>
        <div class="tabel-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Informasi Kontak Pelanggan</th>
                <th>Interaksi dengan Pelanggan</th>
                <th>Skor Kepuasan Pelanggan</th>
                <th>Skor Customer Effort</th>
                <th>Analisis Trend</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["informasi_kontak_pelanggan"]; ?></td>
                            <td><?php echo $row["interaksi_dengan_pelanggan"]; ?></td>
                            <td><?php echo $row["skor_kepuasan_pelanggan"]; ?></td>
                            <td><?php echo $row["skor_customer_effort"]; ?></td>
                            <td><?php echo $row["analisis_trend"]; ?></td>
                            <td>
                              <div class="button-container">
                                  <!-- Tautan Edit -->
                                  <a href="edit.php?id=<?php echo $row["ID"]; ?>" class="edit-button">Edit</a>
                                  <!-- Form untuk penghapusan -->
                                  <form action="remove.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                      <input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
                                      <button type="submit" class="remove-button">Remove</button>
                                  </form>
                              </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="7">Total Data : <?php echo $result->num_rows; ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
