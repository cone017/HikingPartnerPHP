<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        Odjavi se <input type="submit" name="action" value="odjavaAdmin">
    </form>

    <?php
        echo "<h1>OVDE SU ADMINI</h1>";
        $msg = isset($msg)?$msg:"";
    ?>

    <table border="1">
        <tr>
            <th>
                Aktivnost id
            </th>
            <th>
                Naziv aktivnosti
            </th>
            <th>
                Datum pocetka
            </th>
            <th>
                Trajanje
            </th>
            <th>
                Opis
            </th>
            <th>
                Lokacija
            </th>
            <th>
                Tip aktivnosti
            </th>
            <th>
                Korisnik
            </th>
        </tr>
        <?php foreach($_SESSION["aktivnosti"] as $aktivnost) { ?>
        <tr>
            <td><?= $aktivnost["aktivnostId"]?></td>
            <td><?= $aktivnost["nazivAktivnosti"]?></td>
            <td><?= $aktivnost["datumPocetka"]?></td>
            <td><?= $aktivnost["trajanje"]?></td>
            <td><?= $aktivnost["opis"]?></td>
            <td><?= $aktivnost["lokacija"]?></td>
            <td><?= $aktivnost["tipAktivnostiId"]?></td>
            <td><?= $aktivnost["korisnikId"]?></td>
        <?php } ?>
        </tr>
    </table>
<br><br>
    <table border="1">
        <tr>
            <th>
                Korisnik id
            </th>
            <th>
                Ime i prezime
            </th>
            <th>
                Mejl Adresa
            </th>
            <th>
                Sifra
            </th>
            <th>
                Telefon
            </th>
            <th>
                Pol
            </th>
            <th>
                Interesovanje
            </th>
            <th>
                Brisanje
            </th>
        </tr>
        <?php foreach($_SESSION["korisnici"] as $korisnik) { ?>
        <tr>
            <form method="POST">
            <td><?= $korisnik["korisnikId"]?></td>
            <td><?= $korisnik["imePrezime"]?></td>
            <td><?= $korisnik["mejlAdresa"]?></td>
            <td><?= $korisnik["sifra"]?></td>
            <td><?= $korisnik["telefon"]?></td>
            <td><?= $korisnik["pol"]?></td>
            <td><?= $korisnik["interesovanje"]?></td>
            <td>
                <input type="submit" name="action" value="brisanje">    
                <input type="hidden" name="korisnikId" value="<?= $korisnik["korisnikId"] ?>">
            </td>
            </form>
        <?php } ?>
        </tr>
    </table>


    
    <!-- <?php
        var_dump($_SESSION["korisnik"]);
    ?> -->
<br><br><br>
</body>
</html>

