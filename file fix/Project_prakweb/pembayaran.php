<?php
include "koneksi.php";
$kode_sewa = $_POST['kode_sewa'];
$tgl_kembali = $_POST['tanggal_kembali'];
$query2 = mysqli_query($link, "select * from sewa where sid = '$kode_sewa'");
$data2 = mysqli_fetch_array($query2);
$no_plat = $data2['no_plat'];
$query3 = mysqli_query($link, "select * from kendaraan where no_plat = '$no_plat'");
$data3 = mysqli_fetch_array($query3);
    $tgl_sw = $data2['waktu_sewa'];
    $tgl_k = strtotime("$tgl_kembali");
    $tgl_s = strtotime("$tgl_sw");
    $diff = abs($tgl_k - $tgl_s);
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));
    $lama_s = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));

$biaya = $data3['harga_sewa']*$lama_s;
$query = mysqli_query($link, "UPDATE sewa SET tgl_kembali = '$tgl_kembali', biaya = '$biaya' where sid = '$kode_sewa'");

$query4 = mysqli_query($link,"UPDATE kendaraan SET status = 'Sedia' where no_plat = '$no_plat'");
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
  
  <table align="center" cellpadding="5px">
      <tr>
          <td align="center">Transaksi Selesai</td>
      </tr>
      <tr>
          <td align="center">Terimakasih</td>
      </tr>
      <tr>
          <td align="center"><img src="https://associationsnow.com/wp-content/uploads/2018/04/GettyImages-871179392-600x360.jpg"></td>
      </tr>
  </table>
</body>

</html>