<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Naziv aktivnosti:<input type="text" name="nazivAktivnosti"><br>
        Datum pocetka:<input type="date" name="datumPocetka"><br>
        Trajanje:<input type="time" name="trajanje"><br>
        Opis:<input type="text" name="opis"><br>
        <label for="lokacija">Lokacija:</label>
            <select name="lokacija">
                <option value="Cacak">Cacak</option>
                <option value="Kragujevac">Kragujevac</option>
                <option value="Beograd">Beograd</option>
                <option value="Kraljevo">Kraljevo</option>
            </select>
        <br>Tip aktivnosti:<br>
        Trcanje<input type="radio" name="tipAktivnosti" value="1"><br>
        Biciklizam<input type="radio" name="tipAktivnosti" value="3"><br>
        Planinarenje<input type="radio" name="tipAktivnosti" value="2"><br>
        <button type="submit" name="action" value="kreiranjeAktivnosti">Kreiraj aktivnost</button>
    </form>

    <form method="GET">
        <input type="submit" name="action" value="odustanakAktivnost">
    </form>
    <?php
        $msg = isset($msg)?$msg:"";
        echo $msg;
    ?>
</body>
</html>