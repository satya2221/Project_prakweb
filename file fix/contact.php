<?php 
	include "koneksi.php";
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $query = mysqli_query($link,"SELECT * from user where email='$email'");
        $data = mysqli_fetch_array($query);
    }
    if (empty($role)) {
        $role = "kosong";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Contact Us</title>
</head>
<body style="background-color: aliceblue;">
	<nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="homers.php"><img src="logo.svg" width="30" height="30"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
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
                    <li class="nav-item active">
                    	 <?php 
                                if($role !="admin"){ ?>       
                        <a class="nav-link" href="Contact.php">Contact</a>
                        <?php   } ?>
                    </li>
                    </ul>
                    
                        <?php 
                            if(empty($_SESSION['email'])){
                        ?>
                            <a href="login.php"><button class="btn btn-outline-light mx-2">Login</button></a>
                           <!-- <a href="per_regis.php"><button class=" btn btn-outline-dark mx-1">Registrasi</button></a>-->
                        <?php
                 //   header("location:home.php?pesan=belum_login");
                            }
                            else{ ?> <div style="color: white;"> Hello, </div> <a href="profile.php" style="color: orange;">
                                <?php  echo $data['nama'];?></a>
                                <a href="logout.php"><button class="btn btn-outline-light mx-2">Logout</button></a>
                            <?php        
                            }
                            ?>
                </div>
     </nav>
     <center><h1>Contact US</h1></center>
     <div class="container">
     <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
           <form action="" method="POST">
                Nama    <input class="form-control" type="text" name="nama" value="<?php if(isset($_SESSION['email'])){ echo $data['nama'];} ?>" required><br>
                E-mail    <input class="form-control" type="email" name="email" id="" value="<?php if(isset($_SESSION['email'])){ echo $data['email'];} ?>" required><br>
                Pesan <textarea class="form-control" name="alamat" id="" cols="20" rows="5" required></textarea> <br>
                <input type="submit" value="Submit" type="button" class="btn btn-danger" style="margin:auto; display:block;">
            </form>
        </div>
    </div>
	</div>
            <center>
            	<h3 style="margin: 10px;">Our Social Media</h3>
            	<div class="my-3">
            	<a href="https://instagram.com"><img src="iconmonstr-instagram-3.svg" class="mx-2" style="width: 4%;"></a>
            	<a href="https://twitter.com"><img src="twitter.svg" class="mx-2" style="width: 4%;"></a>
            	</div>
            </center>
</body>
</html>