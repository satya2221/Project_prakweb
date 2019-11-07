<html>
<head>
    <title>STAFF</title>
</head>

<body>
<center><h3>Registrasi Staff</h3></center>
    <table align="center" cellpadding="5px">
    <form action="regis.php" method="post">
        <tr><td>Role</td></tr>
        <tr><td><select name="role">
            <option>Pilih Role</option>
            <option value="1">Admin</option>
            <option value="2">Staff</option>
        </select></td></tr>
        <tr><td>ID Staff</td></tr>
        <tr><td><input type="text" name="kid" placeholder="ID Staff"></td></tr>
        <tr><td>Divisi</td></tr>
        <tr><td><input type="text" name="divisi" placeholder="Divisi"></td></tr>
        <tr><td align="center"><input type="submit" value="LANJUT"></td></tr>
    </form>
        
    </table>
</body>
</html>