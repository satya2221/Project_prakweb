<?php
include "koneksi.php";
$id_sewa = $_POST['sid'];
$no_plat = $_POST['no_plat'];
$no_ktp = $_POST['no_ktp'];
$id_kry = $_POST['id_karyawan'];
$tgl_sewa = $_POST['tgl_sewa'];
$lama_sewa = $_POST['lama_sewa'];
$tgl_hrs_kembali = date('Y/m/d', strtotime($tgl_sewa . ' + ' . $lama_sewa . ' days'));

$query = mysqli_query($link, "select * from kendaraan where no_plat = '$no_plat'");
$data = mysqli_fetch_array($query);
$biaya = $lama_sewa * $data['harga_sewa'];
$query2 = mysqli_query($link, "insert into sewa Values ('$id_sewa','$tgl_sewa','$lama_sewa','','$tgl_hrs_kembali','$biaya','$no_plat','$no_ktp','$id_kry')") or die(mysqli_error($link));
$query3 = mysqli_query($link, "UPDATE kendaraan SET status = 'Sewa' where no_plat = '$no_plat'") or die(mysqli_error($link));
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
    <?php if ($query) { ?>
        <center>Transaksi Berhasil</center>
    <?php } else { ?>
        <center>Transaksi Gagal</center>
    <?php } ?>
</body>

</html>