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
        <input type="submit" name="action" value="prikljuceneAktivnosti">
    </form>
    
    <div class="content">
        <?php
            $nr_of_rows = count($_SESSION["aktivnosti"]);
            $pages = ceil($nr_of_rows / 2);

            if (isset($_SESSION["limit"]) && is_array($_SESSION["limit"])) {
                foreach ($_SESSION["limit"] as $row) {
                    echo "<p>{$row["aktivnostId"]} - {$row["nazivAktivnosti"]}</p>";
                }
            }
        ?>
    </div>

    <div class="page-info">
        Showing page <?= isset($_GET["page-nr"]) ? $_GET["page-nr"] : 1 ?> of <?= $pages ?>
    </div>

    <form method="GET">
        <div class="pagination">
            <a href="?action=page-nr&page-nr=1">First</a>
            <?php if (isset($_GET["page-nr"]) && $_GET["page-nr"] > 1) { ?>
                <a href="?action=page-nr&page-nr=<?= $_GET["page-nr"] - 1 ?>">Previous</a>
            <?php } else { ?>
                <span>Previous</span>
            <?php } ?>

            <div class="page-numbers">
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <a href="?action=page-nr&page-nr=<?= $i ?>"><?= $i ?></a>
                <?php } ?>
            </div>

            <?php if (isset($_GET["page-nr"]) && $_GET["page-nr"] < $pages) { ?>
                <a href="?action=page-nr&page-nr=<?= $_GET["page-nr"] + 1 ?>">Next</a>
            <?php } else { ?>
                <span>Next</span>
            <?php } ?>

            <a href="?action=page-nr&page-nr=<?= $pages ?>">Last</a>
        </div>
    </form>

    <form method="GET">
        <input type="submit" name="action" value="kreirajAktivnost">
    </form>
</body>
</html>
