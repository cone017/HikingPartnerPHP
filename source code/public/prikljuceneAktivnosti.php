<?php

$msg = isset($msg)?$msg:"";

if($msg == "korisnik je clan neke aktivnosti")
{
    var_dump($_SESSION["prikljuceneAktivnosti"]);
    ?>
    <form method="GET">
        <input type="submit" name="action" value="odustanakAktivnost">
    </form>
<?php
}
else
    echo "Korisnik nije clan nijedne aktivnosti";

?>