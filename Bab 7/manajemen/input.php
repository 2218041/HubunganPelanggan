<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $informasi_kontak_pelanggan = $_POST['informasi_kontak_pelanggan'];
    $interaksi_dengan_pelanggan = $_POST['interaksi_dengan_pelanggan'];
    $sumber_prospek = $_POST['sumber_prospek'];

    $sql = "INSERT INTO manajemen_kontak (informasi_kontak_pelanggan, interaksi_dengan_pelanggan, sumber_prospek) 
            VALUES ('$informasi_kontak_pelanggan', '$interaksi_dengan_pelanggan', '$sumber_prospek')";

    if (mysqli_query($conn, $sql)) {
        header("Location: manajemen.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Input Data</title>
    <link rel="stylesheet" href="../style/admin.css" />
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
    <div class="sidebar">
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
          <a href="manajemen.php">
            <i class="bx bx-folder"></i>
            <span>Manajemen Kontak</span>
          </a>
        </li>
        <li class="active">
          <a href="#">
            <i class="bx bx-notepad"></i>
            <span>Input Data</span>
          </a>
        </li>
        <li>
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
        <h3 class="main-title">Input Data</h3>
        <div class="form-wrapper">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
              <label for="informasi_kontak_pelanggan">Informasi Kontak Pelanggan</label>
              <textarea id="informasi_kontak_pelanggan" name="informasi_kontak_pelanggan" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="interaksi_dengan_pelanggan">Interaksi dengan Pelanggan</label>
              <textarea id="interaksi_dengan_pelanggan" name="interaksi_dengan_pelanggan" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="sumber_prospek">Sumber Prospek</label>
              <textarea id="sumber_prospek" name="sumber_prospek" rows="4"></textarea>
            </div>
            <div class="button-container">
              <button class="move-button" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
