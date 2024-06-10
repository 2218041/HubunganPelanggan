<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin</title>
    <link rel="stylesheet" href="style/admin.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- 1 -->
    <div class="sidebar">
      <div class="logo"></div>
      <ul class="menu">
        <li class="active">
          <!-- 3 -->
          <a href="#">
            <i class="bx bxs-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="manajemen/manajemen.php">
            <i class="bx bx-folder"></i>
            <span>Manajemen Kontak</span>
          </a>
        </li>
        <li>
          <a href="manajemen/input.php">
            <i class="bx bx-notepad"></i>
            <span>Input Data</span>
          </a>
        </li>
        <li>
          <a href="analisis/analisis.php">
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
          <span>Hubungiku</span>
          <span>Dashboard</span>
        </div>
        <div class="user-info">
          <div class="search">
            <i class="bx bx-search-alt"></i>
            <input type="text" placeholder="Search" />
          </div>
          <img src="image/support.png" alt="" />
          <!-- 4 -->
        </div>
      </div>
      <div class="widget-container">
            <!-- Widget untuk menampilkan jumlah data di analisis.php -->
            <div class="widget">
                <h3>Data Analisis Kepuasan Pelanggan</h3>
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

                    // Query untuk menghitung jumlah data di analisis.php
                    $sql = "SELECT COUNT(*) AS total FROM analisis";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $totalAnalisis = $row['total'];

                    // Menampilkan jumlah data
                    echo "<p>Total data: $totalAnalisis</p>";

                    // Tutup koneksi database
                    $conn->close();
                ?>
            </div>
            <!-- Widget untuk menampilkan jumlah data di manajemen.php -->
            <div class="widget">
                <h3>Data Manajemen Kontak</h3>
                <?php
                    // Koneksi ke database
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk menghitung jumlah data di manajemen.php
                    $sql = "SELECT COUNT(*) AS total FROM manajemen_kontak";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $totalManajemen = $row['total'];

                    // Menampilkan jumlah data
                    echo "<p>Total data: $totalManajemen</p>";

                    // Tutup koneksi database
                    $conn->close();
                ?>
            </div>
        </div>
    </div>
    <!-- 2 -->
  </body>
</html>
