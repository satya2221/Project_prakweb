<?php   
    include "koneksi.php";
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $query = mysqli_query($link,"SELECT * from user where email='$email'");
        $data = mysqli_fetch_array($query);
    }
    else {
        $role = "kosong";
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental Mobil</title>
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="homers.css">
</head>
<body style="background-color: aliceblue;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="homers.php"><img src="logo.svg" width="30" height="30"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="homers.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="mobil.php">Kendaraan</a>
                    </li>
                    <li>
                        <?php 
                            if(isset($_SESSION['email'])){
                                if($data['role']=="admin"){ ?>
                                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                        <?php   }
                                else if (isset($_SESSION['email'])){ 
                                    if ($role=="user"){?>
                                    <a class="nav-link" href="history.php">History</a>
                        <?php        }
                                }
                            }
                        ?>
                    </li>
                    <li>
                        <?php 
                                if($role != "admin"){ ?>
                                    <a class="nav-link" href="Contact.php">Contact</a>
                        <?php   } ?>
                    </li>
                    </ul>
                    
                        <?php 
                            if(empty($_SESSION['email'])){
                        ?>
                            <a href="login.php"><button class="btn btn-outline-light mx-2">Login</button></a>
                           <!-- <a href="per_regis.php"><button class=" btn btn-outline-light mx-1">Registrasi</button></a>-->
                        <?php
                 //   header("location:home.php?pesan=belum_login");
                            }
                            else{ ?><div style="color: white;"> Hello, </div> <a href="profile.php" style="color: orange;">
                                <?php  echo $data['nama'];?></a>
                                <a href="logout.php"><button class="btn btn-outline-light mx-2">Logout</button></a>
                            <?php        
                            }
                            ?>
                </div>
     </nav>
     <div class="jumbotronnya">
        <div class="container p-5">
        <div class="jumbotron text-center " style="border-radius:25px;">
            <center>
                <img src="logo.svg" style="width: 20%; height: 20%;">
                <hr width= "25%" class="my-1">
                <p>Serve The Best For The Best</p>
            </center>    
        </div>
    </div>
    </div>
        <center>
            <h1>WELCOME</h1>
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "belum_login"){ ?>
                <h4>Anda belum melakukan login</h3>    
        <?php   }
                else if($_GET['pesan'] == "logout"){ ?>
                <h4>Anda berhasil logout</h3>
        <?php   }
                else if($_GET['pesan'] == "deleteberhasil"){ ?>
                <h4>Berhasil Delete data kendaraan</h3>
        <?php   }
            }
        ?>
        </center>
    <?php if(empty($_SESSION['email'])||$data['role']!="admin"):?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3><strong>Pinjam Sekarang Juga</strong></h3>
                <p>Butuh motor atau mobil untuk disewa segera? Langsung saja Click tombol dibawah ini untuk memulai perjalanan seru dengan rental kendaraan kami</p>
                <a href="mobil.php"><button class="btn btn-danger">Start Rent</button></a>
            </div>
        </div>
        <div class="row" style="margin-bottom: 18px;">
            <div class="col-6"></div>
            <div class="col-6" align="right">
                    <h3><strong>Hubungi Kami untuk info lebih lanjut</strong></h3>
                    <p>Mau lebih tahu tentang layanan kami? Atau punya saran dan kritik? Tenang saja, anda bisa hubungi kami kapanpun dimanapun dengan click tombol dibawah ini</p>
                    <a href="contact.php"><button class="btn btn-danger" style="margin-bottom: 10px">Contact Us</button></a>
             </div>
        </div>
    </div>
    <?php  else :?>
        <center>
        <h3>Choose What you want to do as admin</h3>
           <div class="tombol" style="margin: 10px;">
            <a href="transaksi.php"><button type="button" class="btn btn-danger btn-lg">Cek Transaksi</button></a> <a href="mobil.php"><button type="button" class="btn btn-danger btn-lg">Edit kendaraan</button></a>
           </div> 
       </center>
    <?php endif;?>
</body>
</html>