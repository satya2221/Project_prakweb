<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>REGISTRASI</title>
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
                       <a class="nav-link" href="Contact.php">Contact</a>
                    </li>
                    <li>
                        <?php 
                            if(isset($_SESSION['email'])){
                                if($data['role']=="admin"){ ?>
                                    <a href="transaksi.php"><button>Transaksi</button></a>
                        <?php   }         
                            }
                        ?>
                    </li>
                    </ul>
                            <a href="login.php"><button class="btn btn-outline-light mx-2">Login</button></a>
                           <!-- <a href="per_regis.php"><button class=" btn btn-outline-dark mx-1">Registrasi</button></a>-->
                </div>
     </nav>
     <center><h2>REGISTRASI</h2></center>
     <div class="container" style="margin-bottom: 10px;">
     <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
           <form action="p_regis.php" method="POST">
                Nama    <input class="form-control" type="text" name="nama" maxlength="30" required><br>
                E-mail    <input class="form-control" type="email" name="email" id="" maxlength="30" required><br>
                Password (maximum 10 character) <input class="form-control" type="password" name="password" id="" maxlength="10" required> <br>
                Alamat <textarea class="form-control" name="alamat" id="" cols="20" rows="5" required></textarea> <br>
                Phone <input class="form-control" type="text" name="nomer" id="" maxlength="12" required><br>
                <input type="hidden" name="role" value="user">
                <input type="submit" value="Sign in" class="btn btn-danger" style="margin:auto;
  display:block;">
            </form>
            Have an account? <a href="login.php" style="color: red;">Login</a>
        </div>
    </div>
    </div>
        
       <!-- <table align="center">
        <form action="p_regis.php" method="post" enctype="multipart/form-data">
            <tr><td>Email</td></tr>
            <tr><td><input type="text" name="email" placeholder="Email"></td></tr>
            <tr><td>Password</td></tr>
            <tr><td><input type="password" name="password" Placeholder="Password">
               <td> <small>Max 10 character</small></td>
            </td></tr>
            <tr><td>Nama</td></tr>
            <tr><td><input type="text" name="nama" placeholder="Nama Lengkap"></td></tr>
            <tr><td>Alamat</td></tr>
            <tr><td><textarea name="alamat" cols="30" rows="5"></textarea></td></tr>
            <tr><td>No. HP</td></tr>
            <tr><td><input type="text" name="no_telp" placeholder="No. HP Aktif"></td></tr>
            <tr><td>Foto Profil</td></tr>
            <tr><td>
             <img src="images/holder.png" id="fotoprofil" onclick="triggerClick()" 
        style="display:block;"> di input = onchange="displayImage(this)" 
                <input type="file" name="foto" id="foto">
            </td></tr>
            <tr>
                <td><input type="hidden" name="role" value="<?php echo $role; ?>"></td>
                <?php if(isset($kid) && isset($divisi)) {?>
                <td><input type="hidden" name="kid" value="<?php echo $kid; ?>"></td>
                <td><input type="hidden" name="divisi" value="<?php echo $divisi; ?>"></td>
                <?php }  ?>
            </tr>
            <tr><td align="center"><input type="submit" value="Registrasi"></td></tr>
        </form>
        </table>-->

<!--    <script scr="coba.js"></script> -->
    </body>
</html>