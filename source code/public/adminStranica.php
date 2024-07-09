<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="../admin/script.js" defer></script> -->
    <style>
        <?php
        require_once("admin/style.css");
        ?>
    </style>
</head>
<body>
    <?php
        require_once("partials/navbar2.html");
    ?>

<div class="table-wrapper">
    <main class="table">
        <section class="table_header">
            <h1 class="first_heading">Upravljanje korisnicima</h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th>Korisnik ID</th>
                        <th>Ime i prezime</th>
                        <th>Mejl Adresa</th>
                        <th>Šifra</th>
                        <th>Telefon</th>
                        <th>Pol</th>
                        <th>Interesovanje</th>
                        <th>Brisanje</th>
                    </tr>
                </thead>
                <tbody>
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
                                <input type="submit" name="action" value="brisanje" class="btn">    
                                <input type="hidden" name="korisnikId" value="<?= $korisnik["korisnikId"] ?>">
                            </td>
                        </form>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
    <!-- Ostali divovi i stilizacija ostaju nepromenjeni -->
</div>
<?php
require_once("partials/footer.html");
?>
    <!-- </div> -->


</body>
</html>

