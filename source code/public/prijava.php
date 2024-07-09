<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Korisnicko ime/Email adresa<input type="text" name="korisnickoIme"><br>
        Lozinka<input type="text" name="lozinka"><br>
        <input type="submit" name="action" value="korisnikPrijava" style="margin-left: 5px;">
    </form>

    <form method="GET">
        <input type="submit" name="action" value="korisnikRegistracija" style="margin-left: 5px;">
        <input type="submit" name="action" value="gostPrijava" style="margin-left: 5px;">
    </form>
    <?php
        $msg = isset($msg)?$msg:"";
        echo $msg;
    ?> 
</body>
</html>