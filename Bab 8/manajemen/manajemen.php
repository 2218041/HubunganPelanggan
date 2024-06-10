<?php
include '../koneksi.php';

$sql = "SELECT * FROM manajemen_kontak";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Kontak</title>
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
        <li class="active">
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
        <h3 class="main-title">Manajemen Kontak</h3>
        <div class="button-container">
          <button class="move-button" onclick="window.location.href='input.php'">Input Data</button>
        </div>
        <div class="tabel-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Informasi Kontak Pelanggan</th>
                <th>Interaksi dengan Pelanggan</th>
                <th>Sumber Prospek</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['ID'] . "</td>";
                      echo "<td>" . $row['informasi_kontak_pelanggan'] . "</td>";
                      echo "<td>" . $row['interaksi_dengan_pelanggan'] . "</td>";
                      echo "<td>" . $row['sumber_prospek'] . "</td>";
                      echo "<td>
                              <div class='button-container'>
                                  <button class='edit-button' onclick='window.location.href=\"edit.php?id=" . $row['ID'] . "\"'>Edit</button>
                                  <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' style='display:inline;'>
                                    <input type='hidden' name='hapus_id' value='" . $row['ID'] . "'>
                                    <button type='submit' class='remove-button'>Remove</button>
                                  </form>
                              </div>
                            </td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="5">Jumlah Data : <?php echo mysqli_num_rows($result); ?></th>
              </tr>
            </tfoot>
          </table>
              <!-- Remove form section -->
              <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_id'])) {
                  $hapus_id = $_POST['hapus_id'];

                  $sql_delete = "DELETE FROM manajemen_kontak WHERE ID='$hapus_id'";

                  if (mysqli_query($conn, $sql_delete)) {
                      header("Location: manajemen.php");
                  } else {
                      echo "Error deleting record: " . mysqli_error($conn);
                  }
              }
              ?>
        </div>
      </div>
    </div>
  </body>
</html>
