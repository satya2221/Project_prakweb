<?php 
    include "koneksi.php";
    $sid = $_GET['kode_sewa'];
    $query3 = mysqli_query($link, "select * from sewa where sid = '$sid'");
    $data3 = mysqli_fetch_array($query3);
    $no_plat = $data3['no_plat'];
    $query2 = mysqli_query($link,"UPDATE kendaraan SET status = 'Sedia' where no_plat = '$no_plat'");
    $query = mysqli_query($link,"DELETE from sewa where sid = '$sid'");
    
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
  <table align="center">
      <tr>
          <th><?php 
                if($query){
                    echo "Cancel Transaksi Berhasil";
                }
                else{
                    echo "Cancel Transaksi Gagal";
                }
              ?>
          </th>
      </tr>
  </table>
</body>
</html>