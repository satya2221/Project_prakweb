<?php 
    include "koneksi.php";
    $query = mysqli_query($link, "select * from karyawan");
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
            <br>
            <h2>Karyawan</h2>
        </center>
        <table align="center" border="1" cellpadding="5px">
    <?php 
        while($data = mysqli_fetch_array($query)){
        ?>
        
           <tr>
               <td>ID Karyawan</td>
               <td><?php echo $data['kid']; ?></td>
           </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $data['knama']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $data['alamat']; ?></td>
            </tr>
            <tr>
                <td>No. Hp</td>
                <td><?php echo $data['no_hp']; ?></td>
            </tr>
            <tr>
                <td colspan="2" style="background:blue;"></td>
            </tr>
    <?php } ?>
    </table>
</body>
</html>