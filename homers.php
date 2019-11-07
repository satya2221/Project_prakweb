<?php   
    session_start();
    include "koneksi.php";
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = mysqli_query($link,"select * from user where email='$email'");
        $data = mysqli_fetch_array($query);
    }
    Echo "nyong";
    
?>

<html>
    <head>
        <title>Rental Mobil</title>
    </head>
    
    <body>
     <div class="container">
      <div class="header">
          <div align="right">
            <a href="homers.php"><button>Home</button></a>
            <a href="mobil.php"><button>Kendaraan</button></a>
            <a href="rental.php"><button>Rental</button></a>
            <?php 
            if(isset($_SESSION['email'])){
                if($data['role']=="admin"){ ?>
                    <a href="transaksi.php"><button>Transaksi</button></a>
            <?php }   }
            ?>
            
            <a href="about_us.php"><button>About Us</button></a>
            <?php 
                if(empty($_SESSION['email'])){
            ?>
                    <a href="login.php"><button>Login</button></a>
                    <a href="per_regis.php"><button>Registrasi</button></a>
            <?php
                 //   header("location:home.php?pesan=belum_login");
                }
                else{ ?>
                    <a href="profil.php"><img src="<?php echo $data['foto'];?>" style="width=10px; height=10px;">
                    <?php  echo $data['nama'];?></a>
            <?php        
                }
            ?>
            
          </div>
      </div>
        <center>
            <h1>Rental Mobil RAR</h1>
        </center>
        <p>BLA BLA BLA</p>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "belum_login"){ ?>
            <h3 align="center">Anda belum melakukan login</h3>    
            <?php   }
            else if($_GET['pesan'] == "logout"){ ?>
                <h3 align="center">Anda berhasil logout</h3>
        <?php   }
            }
        ?>
    </div>
    
    </body>
</html>
