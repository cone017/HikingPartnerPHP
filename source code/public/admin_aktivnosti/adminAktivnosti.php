<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../admin/script.js" defer></script>
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
            <h1 class="first_heading">Upravljanje aktivnostima</h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th>Aktivnost ID</th>
                        <th>Naziv aktivnosti</th>
                        <th>Datum početka</th>
                        <th>Trajanje</th>
                        <th>Opis</th>
                        <th>Lokacija</th>
                        <th>Tip aktivnosti</th>
                        <th>Korisnik</th>
                    </tr>
                </thead>
                <tbody>
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
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
    <!-- Ostali divovi i stilizacija ostaju nepromenjeni -->
</div>

    <!-- </div> -->


</body>
</html>

