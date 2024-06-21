<?php

$msg = isset($msg)?$msg:"";

if($msg == "korisnik je clan neke aktivnosti")
    var_dump($_SESSION["prikljuceneAktivnosti"]);

else
    echo "Korisnik nije clan nijedne aktivnosti";

?>