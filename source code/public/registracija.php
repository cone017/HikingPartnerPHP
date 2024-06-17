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
        Ime i prezime:<input type="text" name="imePrezime"><br>
        Mejl adresa:<input type="text" name="mejl"><br>
        Sifra:<input type="text" name="sifra"><br>
        Telefon:<input type="text" name="telefon"><br>
        Pol:<br>
        Muski<input type="radio" name="pol" value="muski"><br>
        Zenski<input type="radio" name="pol" value="zenski"><br>
        Interesovanje:<br>
        Trcanje<input type="radio" name="interesovanje" value="trcanje"><br>
        Biciklizam<input type="radio" name="interesovanje" value="biciklizam"><br>
        Planinarenje<input type="radio" name="interesovanje" value="planinarenje"><br>
        <button type="submit" name="action" value="registracijaKorisnik">Registruj se</button>
    </form>

    <form method="GET">
        <button type="submit" name="action" value="pocetna">Odustanak</button>
    </form>

    <?php echo $msg; ?>
</body>
</html>