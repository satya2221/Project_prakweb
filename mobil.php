<?php 
    include "koneksi.php";
    $query = mysqli_query($link,"select * from kendaraan");
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
        <table  border="1" cellpadding="5px">
          <tr>
              <th colspan="7" align="center">List Kendaraan</th>
          </tr>
           <tr>
               <th>No Plat</th>
               <th>Jenis</th>
               <th>Merk</th>
               <th>Brand</th>
               <th>Harga (per Hari)</th>
               <th>Status</th>
               <td></td>
           </tr>
           <?php 
            while($data = mysqli_fetch_array($query)) {?>
            <tr>
                <td><?php echo $data['no_plat']; ?></td>
                <td><?php echo $data['jenis_kendaraan']; ?></td>
                <td><?php echo $data['merk_kendaraan']; ?></td>
                <td><?php echo $data['brand_kendaraan']; ?></td>
                <td><center><?php echo $data['harga_sewa']; ?></center></td>
                <td align="center"><?php echo $data['status']; ?></td>
                <td>
                <?php
                    if($data['status']=="Sedia"){ ?>
                <a href=rental.php?no_plat=<?php echo $data['no_plat']; ?>>
                <button><i class="fas fa-send"></i>Sewa</button></a>
                <?php    }
                ?>
                </td>
            </tr>
            <?php } ?>
        </table>
      </center>
    </body>
</html>