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
                $nr_of_rows = count($_SESSION["aktivnosti"]);
                $pages = ceil($nr_of_rows / 2);

                if (isset($_SESSION["limit"]) && is_array($_SESSION["limit"])) {
                    foreach ($_SESSION["limit"] as $row) {
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
                            <form method="GET">
                                <input type="hidden" name="aktivnostId" value="<?=$row['aktivnostId']?>">
                                <p class="naziv"><?php echo htmlspecialchars($row['nazivAktivnosti']); ?></p>
                                <p class="kategorija"><b>Lokacija:</b>&nbsp;<?php echo htmlspecialchars($row['lokacija']); ?></p>
                                <p class="datum"><b>Datum:</b>&nbsp;<?php echo htmlspecialchars($row['datumPocetka']); ?></p>
                                <input type="submit" name="action" value="detaljnije">
                            </form>
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
                    <?php } if (isset($_COOKIE["poslednja"]))
                                echo $_COOKIE["poslednja"]; ?>
                </div>
            </div>
        </div>
                       
        <?php require_once("partials/footer.html"); ?>
    </div>
</body>
</html>
