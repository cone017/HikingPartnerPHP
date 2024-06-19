<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once "../controller/aktivnostDAO.php";
    require_once "../controller/clanoviAktivnostDAO.php";

    $aktivnostDAO = new aktivnostDAO();

    $aktivnost = $aktivnostDAO -> getAktivnostById($_SESSION["aktivnostId"]);

    var_dump($aktivnost);
?>
<form method="GET">
    <input type="submit" name="action" value="odustanakAktivnost">
</form>

    <br><br>Clanovi ove aktivnosti: <br><?php var_dump($_SESSION["clanovi"]) ?>
    <form method="POST">
        <input type="submit" name="action" value="pridruziSe">
    </form>

    <?php
        $msg = isset($msg)?$msg:"";
        echo $msg;
    ?>
</body>
</html>