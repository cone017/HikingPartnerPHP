<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        require_once("kreiraj_aktivnost/style.css");
        ?>
    </style>
</head>
<body>
    <div class="div-wrapper">
        <?php
         require_once("partials/navbarDodajAktv.html");
        ?>
        <div class="form-box">
            <div class="create-activity-container">
                <div class="top">
                    <header>Kreiraj svoju aktivnost</header>
                </div>
                <form method="POST">
                    <div class="input-box">
                        <label for="naziv_aktivnosti" class="label-activity">Naziv aktivnosti:</label>
                        <input type="text" name="nazivAktivnosti" class="input-field" id="naziv_aktivnosti" placeholder="Uneti naziv aktivnosti...">
                    </div>
        <div class="input-box">
            <label for="datum_aktivnosti" class="label-activity">Datum početka:</label>
            <input type="date" class="input-field" name="datumPocetka" id="datum_aktivnosti">
        </div>
        <div class="input-box">
            <label for="trajanje" class="label-activity">Vreme:</label>
            <input type="time" name="trajanje" id="trajanje" class="input-field">
        </div>
        <div class="input-box">
            <label for="opis" class="label-activity">Opis:</label>
            <input type="text" name="opis" class="input-field" id="opis" placeholder="Dodati kratak opis...">
        </div>
        <div class="input-box">
        <label for="lokacija" class="label-activity">Lokacija:</label>
            <select name="lokacija" class="input-field">
                <option value="Cacak">Cacak</option>
                <option value="Kragujevac">Kragujevac</option>
                <option value="Beograd">Beograd</option>
                <option value="Kraljevo">Kraljevo</option>
            </select>
        </div>
        <div class="input-box">
        <label for="" class="labelfirstgender">Tip aktivnosti:</label>
        <label for="option1" class="labelactivity">Trčanje</label>
        <input type="radio" name="tipAktivnosti" value="1" id="option1" class="input-field-radio">

        <label for="option2" class="labelactivity">Biciklizam</label>
        <input type="radio" name="tipAktivnosti" value="3" id="option2" class="input-field-radio">

        <label for="option3" class="labelactivity">Planinarenje</label>
        <input type="radio" name="tipAktivnosti" value="2" id="option3" class="input-field-radio">
        </div>

        <div class="input-box">
        <button type="submit" name="action" class="submit" value="Kreiraj aktivnost">Kreiraj aktivnost</button>
        </div>
        
    </form>
    <?php
        $msg = isset($msg)?$msg:"";
        echo "<p class='message'>$msg</p>";
    ?>
            </div>
        </div>


<?php
        require_once("partials/footer.html");
    ?>
    </div>
</body>
</html>