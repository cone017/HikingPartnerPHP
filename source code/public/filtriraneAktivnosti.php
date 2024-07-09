<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartice sa aktivnostima</title>
    <style>
        <?php
        require_once("aktivnosti/style.css");
        ?>
    </style>
</head>
<body>
<div class="div-wrapper">
        <?php require_once("partials/navbarAktivnosti.html"); ?>

        <div class="wrapper-card">
            <div class="card-container">
                <?php
                $nr_of_rows = count($_SESSION["interesovanja"]);
                $pages = ceil($nr_of_rows / 2);

                if (isset($_SESSION["interesovanja"]) && is_array($_SESSION["interesovanja"])) {
                    foreach ($_SESSION["interesovanja"] as $row) {
                        $imageSrc = "";
                        if($row['tipAktivnostiId'] == 1) {
                            $imageSrc = "../images/runner.png";
                        } elseif($row['tipAktivnostiId'] == 2) {
                            $imageSrc = "../images/hiking.png";
                        } elseif($row['tipAktivnostiId'] == 3) {
                            $imageSrc = "../images/bicycle.png";
                        }
                        ?>
                        <div class="card">
                            <p class="id"><img src="<?php echo htmlspecialchars($imageSrc); ?>" alt="nema" /></p>
                            <div class="card-content">
                                <p class="naziv"><?php echo htmlspecialchars($row['nazivAktivnosti']); ?></p>
                                <p class="kategorija"><b>Lokacija:</b>&nbsp;<?php echo htmlspecialchars($row['lokacija']); ?></p>
                                <p class="datum"><b>Datum:</b>&nbsp;<?php echo htmlspecialchars($row['datumPocetka']); ?></p>
                                <a href="" class="btn">Saznaj više...</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="paginationnew">
                <div class="page-numbers" id="pageColor">
                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                        <a href="?action=page-nr&page-nr=<?= $i ?>"><?= $i ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
                       
        <?php require_once("partials/footer.html"); ?>
    </div>
</body>
</html>
