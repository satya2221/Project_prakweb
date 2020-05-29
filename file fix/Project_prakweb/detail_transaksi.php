<?php
    include "koneksi.php";
    $kode_sewa = $_GET['kode_sewa'];
    $query = mysqli_query($link,"select * from sewa where sid = '$kode_sewa'");
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
        <table align="center" border="1" cellpadding="5px" cellspacing="5px">
           <?php 
                $no_ktp = $data['ktp'];
                $query2 = mysqli_query($link,"select * from penyewa where ktp = '$no_ktp'");
                $data2 = mysqli_fetch_array($query2);
            
                $no_plat = $data['no_plat'];
                $query3 = mysqli_query($link,"select * from kendaraan where no_plat = '$no_plat'");
                $data3 = mysqli_fetch_array($query3);
                
                $kid = $data['kid'];
                $query4 = mysqli_query($link,"select * from karyawan where kid = '$kid'");
                $data4 = mysqli_fetch_array($query4);
            ?>
            <tr>
                <th colspan="6" align="center">Laporan Transaksi SID <?php echo $kode_sewa; ?></th>
            </tr>
            <tr>
                <td colspan="2" align="center">Penyewa</td>
                <td colspan="2" align="center">Kendaraan</td>
                <td colspan="2" align="center">Transaksi</td>
            </tr>
            <tr>
                <td>No KTP</td>
                <td><?php echo $data2['ktp'];?></td>
                <td>No Plat</td>
                <td><?php echo $data3['no_plat'];?></td>
                <td>Tanggal Sewa</td>
                <td><?php 
                    $tgl_s = $data['waktu_sewa'];
                    $tgl_sewa = date("d M Y",strtotime($tgl_s));
                    echo $tgl_sewa; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $data2['pnama'];?></td>
                <td>Jenis Kendaraan</td>
                <td><?php echo $data3['jenis_kendaraan'];?></td>
                <td>Lama Sewa</td>
                <td><?php echo $data['lama_sewa']." hari";?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $data2['palamat'];?></td>
                <td>Brand (Warna)</td>
                <td><?php echo $data3['merk_kendaraan'];?></td>
                <td>Tanggal Harus Kembali</td>
                <td><?php 
                    $tgl_hk = $data['kembali_seharusnya'];
                    $tgl_hrs_k = date("d M Y",strtotime($tgl_hk));
                    echo $tgl_hrs_k; ?></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td><?php echo $data2['pno_hp'];?></td>
                <td>Harga Sewa (per hari)</td>
                <td><?php echo $data3['harga_sewa'];?></td>
                <td>Tanggal Kembali</td>
                <td><?php
                        if($data['tgl_kembali'] != '0000-00-00 00:00:00'){
                        $tgl_k = $data['tgl_kembali']; 
                        $tgl_back = date("d M Y", strtotime($tgl_k));
                        echo $tgl_back; }
                        else{
                            echo "Belum Kembali";
                        }
                    ?></td>
            </tr>
            <tr>
                <td align="center" colspan="4">Karyawan</td>
                <td>Total Biaya</td>
                <td><?php echo $data['biaya'];?></td>
            </tr>
            <tr>
                <td colspan="2">ID Karyawan</td>
                <td colspan="2"><?php echo $data['kid']; ?></td>
                <td rowspan="2">Status Transaksi</td>
                <td rowspan="2" align="center" style="background:red"><?php
                        if($data['tgl_kembali'] != '0000-00-00 00:00:00'){
                        echo "Selesai"; }
                        else{
                            echo "Belum Selesai";
                        }
                    ?></td>
            </tr>
            <tr>
                <td colspan="2">Nama Karyawaan</td>
                <td colspan="2"><?php echo $data4['knama']; ?></td>
                
            </tr>
        </table>
    </body>
</html>