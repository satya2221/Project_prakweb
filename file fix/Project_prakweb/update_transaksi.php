<?php
include "koneksi.php";
$kode_sewa = $_GET['kode_sewa'];
$query = mysqli_query($link, "select * from sewa where sid='$kode_sewa'");
$data = mysqli_fetch_array($query);
?>

<html>

<head>
  <title>Rental Mobil</title>
</head>

<body>
  <div class="container">
    <div class="header">
      <div align="right">
        <a href="home.php"><button>Home</button></a>
        <a href="mobil.php"><button>Kendaraan</button></a>
        <a href="rental.php"><button>Rental</button></a>
        <a href="transaksi.php"><button>Transaksi</button></a>
        <a href="about_us.php"><button>About Us</button></a>
      </div>
    </div>
  </div>
  <center>
    <h1>Rental Mobil RAR</h1>
  </center>

  <table align="center" border="1" cellpadding="5px">
    <form action="pembayaran.php" method="POST">
      <input type="hidden" name="kode_sewa" value="<?php echo $data['sid']; ?>">
      <tr>
        <td colspan="2" align="center">Update Transaksi</td>
      </tr>
      <tr>
        <td>Kode Sewa</td>
        <td><?php echo $data['sid']; ?></td>
      </tr>
      <tr>
        <td>No Plat</td>
        <td><?php echo $data['no_plat']; ?></td>
      </tr>
      <tr>
        <td>Tanggal Sewa</td>
        <td><?php $tgl_s = $data['waktu_sewa'];
            $tgl_sewa = date("d M Y", strtotime($tgl_s));
            echo $tgl_sewa; ?></td>
      </tr>
      <tr>
        <td>Tanggal Kembali</td>
        <td><input type="date" name="tanggal_kembali"></td>
      </tr>
      <tr>
        <td align="center"><input type="reset" value="Ulang"></td>
        <td align="center"><input type="submit" value="Bayar"></td>
      </tr>
    </form>
  </table>
</body>

</html>