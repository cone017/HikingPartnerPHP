<?php $msg = isset($msg)?$msg:""; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Korisnicko ime<input type="text" name="korisnickoIme"><br>
        Lozinka<input type="text" name="lozinka"><br>
        <input type="submit" name="action" value="adminPrijava">
    </form>

    <?php echo $msg; ?>
    
</body>
</html>