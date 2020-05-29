<?php  include "koneksi.php"; 
    if(isset($_POST['no_plat'])){
        $no_plat = $_POST['no_plat'];
    }
    else{
        $no_plat = $_POST['sewa'];
    }
    if(!empty($_POST['ktp_baru'])){
         $no_ktp = $_POST['ktp_baru'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $query = mysqli_query($link,"insert into penyewa values ('$no_ktp','$nama','$alamat','$no_telp');") or die(mysqli_error($link));
    }
   else{
       $no_ktp = $_POST['ktp_lama'];
   }
    
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
    <center>Data penyewa Tersimpan</center>
    <form action="lanjut_sewa.php" method="post">
        <table align="center" border="1" cellpadding="5px">
            <tr>
                <th colspan="2">Informasi Sewa</th>
                <input type="hidden" name="no_plat" value="<?php echo $no_plat; ?>">
                <input type="hidden" name="no_ktp" value="<?php echo $no_ktp; ?>">
            </tr>
            <tr>
                <td>ID Karyawan</td>
                <td><select name="id_karyawan">
                <?php 
                    $query2 = mysqli_query($link,"select * from karyawan");
                    while($data2 = mysqli_fetch_array($query2)){
                ?>
                    <option value="<?php echo $data2['kid']; ?>"><?php echo $data2['panggilan']; ?></option>
                <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td>ID Sewa</td>
                <td><input type="text" name="sid" placeholder="ID Sewa"></td>
            </tr>
            <tr>
                <td>Tanggal Sewa</td>
                <td><input type="date" name="tgl_sewa"></td>
            </tr>
            <tr>
                <td>Lama sewa (hari)</td>
                <td><input type="number" name="lama_sewa"></td>
            </tr>
            <tr>
                <td align="center"><input type="reset" value="Ulang"></td>
                <td align="center"><input type="submit" value="Kirim"></td>
            </tr>
        </table>
    </form>
        
    </body>
</html>