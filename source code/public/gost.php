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
                require_once("../controller/aktivnostDAO.php");
                $dao = new aktivnostDAO();
                
                $_SESSION["aktivnosti"] = $dao -> getAll();
                $nr_of_rows = count($_SESSION["aktivnosti"]);
                

                if (isset($_SESSION["aktivnosti"]) && is_array($_SESSION["aktivnosti"])) {
                    foreach ($_SESSION["aktivnosti"] as $row) {
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
                                <input type="hidden" name="aktivnostId" value="<?=$row['aktivnostId']?>">
                                <p class="naziv"><?php echo htmlspecialchars($row['nazivAktivnosti']); ?></p>
                                <p class="kategorija"><b>Lokacija:</b>&nbsp;<?php echo htmlspecialchars($row['lokacija']); ?></p>
                                <p class="datum"><b>Datum:</b>&nbsp;<?php echo htmlspecialchars($row['datumPocetka']); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
                       
        <?php require_once("partials/footer.html"); ?>
    </div>
</body>
</html>
