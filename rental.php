<?php  include "koneksi.php"; 
    if(isset($_GET['no_plat'])){
        $no_plat = $_GET['no_plat'];
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
    <form method="post" action="konfirmasi_sewa.php">
<?php
    if(empty($_GET['no_plat'])){
        ?>
    <table align="center" border="1" cellpadding="5px">
        <tr>
            <th colspan="6">List Kendaraan</th>
            <?php 
                $query2 = mysqli_query($link,"select * from kendaraan where status = 'Sedia'");
            ?>
        </tr>
        <tr>
            <td>No Plat</td>
           <td>Jenis</td>
           <td>Merk</td>
           <td>Harga Sewa (per Hari)</td>
           <td align="center">Pilihan</td>
        </tr>
       <?php 
            while($data = mysqli_fetch_array($query2)) {?>
            <tr>
               <td><?php echo $data['no_plat']; ?></td>
                <td><?php echo $data['jenis_kendaraan']?></td>
                <td><?php echo $data['merk_kendaraan']?></td>
                <td><center><?php echo $data['harga_sewa']?></center></td>
                <td>
                    <input type="radio" name="sewa" value="<?php echo $data['no_plat']; ?>">Ingin Menyewa
                </td>
            </tr>

            <?php } ?>
      </table>
<?php
    }
    else{
        $query = mysqli_query($link,"select * from kendaraan where no_plat = '$no_plat'");
        $data = mysqli_fetch_array($query);
?>
   <table align="center" border="1" cellpadding="5px">
    <tr>
        <th colspan="2">Informasi Kendaraan</th>
        <input type="hidden" name="no_plat" value="<?php echo $data['no_plat']; ?>">
    </tr>
    <tr>
        <td>No. Plat</td>
        <td><?php echo $data['no_plat']; ?></td>
    </tr>
    <tr>
        <td>Jenis</td>
        <td><?php echo $data['jenis_kendaraan']?></td>
    </tr>
    <tr>
        <td>Brand</td>
        <td><?php echo $data['merk_kendaraan']?></td>
    </tr>
    <tr>
        <td>Harga Sewa (per hari)</td>
        <td><?php echo $data['harga_sewa']?></td>
    </tr>
    </table>
<?php } ?>
   <br><br>
    <table align="center" border="1" cellpadding="5px">
        <tr>
            <th colspan="3">Informasi Penyewa</th>
        </tr>
        <tr>
            <th colspan="2">Baru</th>
            
            <th>Lama</th>
        </tr>
        <tr>
            <td>No. KTP</td>
            <td><input type="text" name="ktp_baru" placeholder="No. KTP"></td>
            <td><select name="ktp_lama"><option>----Penyewa Terdaftar---</option>
                <?php $query3 = mysqli_query($link,"select * from penyewa");
                    while($data3 = mysqli_fetch_array($query3)){
                ?>
                <option value="<?php echo $data3['ktp'];?>"><?php echo $data3['pnama'];?></option>
                <?php } ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" placeholder="Nama"></td>
            <td>Note : Pilih salah satu !
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" placeholder="Alamat" cols="21" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><input type="text" name="no_telp" placeholder="No. Telp"></td>
        </tr>
        <tr>
            <td align="center"><input type="reset" value="Ulang"></td>
            <td align="center" colspan="2"><input type="submit" value="Kirim"></td>
        </tr>
    </table>
    </form>
    </body>
</html>