<html>
    <head>
        <title>LOGIN</title>
    </head>

    <body>
        <center><h2>LOGIN</h2></center>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){ ?>
            <h3 align="center">Login gagal! Email dan/atau password salah!</h3>    
            <?php   }
            }
        ?>
        <table align="center" cellpadding="5px">
        <form action=""></form>
            <tr>
                <td>Email</td>
            </tr>
            <tr>
                <td><input type="text" name="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td>Password</td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" name="login" value="LOGIN"></td>
            </tr>
        </table>
    </body>
</html>