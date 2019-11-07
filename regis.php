<?php
    if(isset($_POST['role'])){
        $role = $_POST['role'];
    }
    else{
        $role=3;
    }
    if(isset($_POST['kid'])){
        $kid = $_POST['kid'];
    }
    if(isset($_POST['divisi'])){
        $divisi = $_POST['divisi'];
    }
?>

<html>
    <head>
        <title>REGISTRASI</title>
    </head>

    <body>
        <center><h2>REGISTRASI</h2></center>
        <table align="center">
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
        <!--        <img src="images/holder.png" id="fotoprofil" onclick="triggerClick()" 
        style="display:block;"> di input = onchange="displayImage(this)" -->
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
        </table>

<!--    <script scr="coba.js"></script> -->
    </body>
</html>