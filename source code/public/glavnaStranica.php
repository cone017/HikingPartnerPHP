<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="submit" name="action" value="odjavaKorisnik">
        <input type="submit" name="action" value="podaciKorisnik">
    </form>

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

    <form method="GET">
        <input type="submit" name="action" value="kreirajAktivnost">
    </form>
</body>
</html>
<?php
    echo "Prijavljen korisnik:".$_SESSION["mejlAdresa"]."<br>";
    echo "Id korisnika:".$_SESSION["korisnikId"];
?>