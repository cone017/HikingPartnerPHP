<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        Odjavi se <input type="submit" name="action" value="odjavaKorisnik">
    </form>
</body>
</html>

<?php

echo "<h1>OVDE SU KORISNICI</h1>";
echo "Prijavljen korisnik:".$_SESSION["mejlAdresa"];

?>