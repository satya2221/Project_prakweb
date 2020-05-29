<?php
include "koneksi.php";
$query = mysqli_query($link, "select * from sewa s inner join kendaraan k on s.no_plat = k.no_plat inner join penyewa p on s.ktp = p.ktp inner join karyawan kry on s.kid = kry.kid order by s.sid ASC");
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
        <tr>
            <th colspan="10">Daftar Transaksi</th>
        </tr>
        <tr>
            <th>ID Sewa</th>
            <th>Karyawan</th>
            <th>No. Plat</th>
            <th>Penyewa</th>
            <th>Tanggal Sewa</th>
            <th>Lama Sewa</th>
            <th>Tanggal Harus Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Biaya</th>
            <th></th>
        </tr>
        <?php while ($data = mysqli_fetch_array($query)) { ?>
            <tr align="center">
                <td><?php echo $data['sid']; ?></td>
                <td><?php echo $data['panggilan']; ?></td>
                <td><?php echo $data['no_plat']; ?></td>
                <td><?php echo $data['pnama']; ?></td>
                <td><?php
                        $tgl_s = $data['waktu_sewa'];
                        $tgl_sewa = date("d M Y", strtotime($tgl_s));
                        echo $tgl_sewa;
                        ?></td>
                <td><?php echo $data['lama_sewa']; ?></td>
                <td><?php
                        $tgl_hk = $data['kembali_seharusnya'];
                        $tgl_hrs_k = date("d M Y", strtotime($tgl_hk));
                        echo $tgl_hrs_k; ?>
                </td>
                <td><?php
                        if($data['tgl_kembali'] != '0000-00-00 00:00:00'){
                        $tgl_k = $data['tgl_kembali']; 
                        $tgl_back = date("d M Y", strtotime($tgl_k));
                        echo $tgl_back; }
                        else{
                            echo "Belum Kembali";
                        }
                    ?></td>
                <td><?php echo $data['biaya']; ?></td>
                <td><a href="detail_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>"><button>Detail</button></a>
                   <?php if ($data['tgl_kembali'] == '0000-00-00 00:00:00') {?>
                    <a href="update_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>"><button>Bayar</button></a>
                    <a href="cancel_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>"><button>Cancel</button></a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>