<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <title>LOGIN</title>
    </head>
    <body style="background-color: aliceblue;">
        <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><img src="logo.svg" width="30" height="30"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="homers.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="mobil.php">Kendaraan</a>
                    </li>
                    <li>
                       <a class="nav-link" href="Contact.php">Contact</a>
                    </li>
                </div>
        </nav>
        <center><h2 class="mt-2">LOGIN</h2></center>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){ 
        ?>
                <h3 align="center">Login gagal! Email dan/atau password salah!</h3>    
        <?php   
                }
                elseif ($_GET['pesan'] == "belum_login") {
        ?>
                <h3 align="center">Anda belum Login</h3>
        <?php
                }
                else if($_GET['pesan'] == "regisberhasil"){ ?>
                <h4 align="center">Registrasi berhasil silakan login</h3>
        <?php   }
        else{ echo "gagal";}
            }
        ?>
    <div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
           <form action="cek_login.php" method="POST">
                E-mail    <input class="form-control" type="email" name="email" id="" maxlength="30" required> <br>
                Password <input class="form-control" type="password" name="password" maxlength="10" id="" required> <br>
                <input type="submit" value="Login" class="btn btn-danger" style="margin:auto;
  display:block;">
            </form>
            Don't have an account? <a href="regis.php" style="color: red;">Sign in</a>
        </div>
    </div>
    </div>
    </body>
</html>