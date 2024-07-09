<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        require_once("prijavljeni_korisnik/style.css");
        ?>
    </style>
</head>
<body>
<?php
        $imePrezimeUpdate = $_SESSION["korisnik"]["imePrezime"];
        $mejlAdresaUpdate = $_SESSION["korisnik"]["mejlAdresa"];
        $sifraUpdate = $_SESSION["korisnik"]["sifra"];
        $telefonUpdate = $_SESSION["korisnik"]["telefon"];
        $polUpdate = $_SESSION["korisnik"]["pol"];
        $interesovanjeUpdate = $_SESSION["korisnik"]["interesovanje"];
    ?>

    <div class="all-wrapper">
    <div class="wrapper">
        <div class="left">
        <img src="../images/generateuser.png" alt="user" width="40" />
        <h4 style="text-decoration: underline">Prijavljeni korisnik:</h4>
        <label name="imePrezime" value="<?=$_SESSION["korisnik"]["imePrezime"]?>">Ime:&nbsp;<?=$_SESSION["korisnik"]["imePrezime"]?></label><br>
        </div>

        <div class="right">
    <div class="info">
        <h3>Informacije</h3>
        <div class="info_data">
            <div class="data">
                <h4 style="text-transform: uppercase">Email:</h4>
                <label><?=$_SESSION["korisnik"]["mejlAdresa"]?></label>
            </div>
            <div class="data">
                <h4 style="text-transform: uppercase">Telefon:</h4>
                <label><?=$_SESSION["korisnik"]["telefon"]?></label>
            </div>
            <div class="data">
                <h4 style="text-transform: uppercase">Pol:</h4>
                <label><?=$_SESSION["korisnik"]["pol"]?></label>
            </div>
        </div>
    </div>

    <form action="" method="post">
        <div class="data">
            <h4 style="text-transform: uppercase">Šifra:</h4>
            <div class="input-star">
            <input type="password" name="sifraUpdate" value="" placeholder="Uneti novu šifru...">&nbsp;<p class="star">*</p>
            </div>
            
        </div>
        
        <div class="projects">
            <h3>Omiljena aktivnost</h3>
            <div class="projects_data">
                <div class="data">
                    <div class="input-content">
                        Trčanje&nbsp;<input type="radio" name="interesovanjeUpdate" value="trcanje" <?php echo ($interesovanjeUpdate == "trcanje") ? "checked" : "" ?>><br>
                        Planinarenje&nbsp;<input type="radio" name="interesovanjeUpdate" value="planinarenje" <?php echo ($interesovanjeUpdate == "planinarenje") ? "checked" : "" ?>><br>
                        Biciklizam&nbsp;<input type="radio" name="interesovanjeUpdate" value="biciklizam" <?php echo ($interesovanjeUpdate == "biciklizam") ? "checked" : "" ?>><br>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" name="action" value="izmeni" class="dugmePotvrdi">
    </form>
    <?php
        $msg = isset($msg)?$msg:"";
        echo "<p class='message'>$msg</p>";
    ?>
</div>
        
    </div>
    <?php
    require_once("partials/navbarDodajAktv.html");
    ?>



<!-- Ovde ide GET i POST -->


    <?php
    require_once("partials/footer.html");
    ?>



       
</div>
</body>
</html>