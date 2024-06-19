<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="submit" name="action" value="glavna">
    </form>
    <br><br>
    <?php
        $imePrezimeUpdate = $_SESSION["korisnik"]["imePrezime"];
        $mejlAdresaUpdate = $_SESSION["korisnik"]["mejlAdresa"];
        $sifraUpdate = $_SESSION["korisnik"]["sifra"];
        $telefonUpdate = $_SESSION["korisnik"]["telefon"];
        $polUpdate = $_SESSION["korisnik"]["pol"];
        $interesovanjeUpdate = $_SESSION["korisnik"]["interesovanje"];
    ?>
    <form method="POST">
        <label name="korisnikId" value="<?=$_SESSION["korisnik"]["korisnikId"]?>">Korisnik id:<?=$_SESSION["korisnik"]["korisnikId"]?></label><br>
        Ime i prezime: <input type="text" name="imePrezimeUpdate" value="<?=$imePrezimeUpdate?>"><br>
        Mejl adresa: <input type="text" name="mejlAdresaUpdate" value="<?=$mejlAdresaUpdate?>"><br>
        Sifra: <input type="text" name="sifraUpdate" value="<?=$sifraUpdate?>"><br>
        Telefon: <input type="text" name="telefonUpdate" value="<?=$telefonUpdate?>"><br>
        Pol:<br>
        Muski<input type="radio" name="polUpdate" value="muski" <?php echo ($polUpdate == "muski")? "checked" : "" ?>><br>
        Zenski<input type="radio" name="polUpdate" value="zenski" <?php echo ($polUpdate == "zenski")? "checked" : "" ?>><br>
        Interesovanje:<br>
        Trcanje<input type="radio" name="interesovanjeUpdate" value="trcanje" <?php echo ($interesovanjeUpdate == "trcanje")? "checked" : "" ?>><br>
        Planinarenje<input type="radio" name="interesovanjeUpdate" value="planinarenje" <?php echo ($interesovanjeUpdate == "planinarenje")? "checked" : "" ?>><br>
        Biciklizam<input type="radio" name="interesovanjeUpdate" value="biciklizam" <?php echo ($interesovanjeUpdate == "biciklizam")? "checked" : "" ?>><br>
        <input type="submit" name="action" value="izmeni">
    </form>
    <br><br>
    <?php
        $msg = isset($msg)?$msg:"";
        echo $msg;
    ?>
</body>
</html>