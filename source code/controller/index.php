<?php

    $action = isset($_REQUEST["action"])?$_REQUEST["action"]:"";
    require_once "Controller.php";

    $cs = new adminController();

    switch($_SERVER["REQUEST_METHOD"])
    {
        case "GET":
            switch($action)
            {
                case "pocetna":
                    include "../public/pocetna.php";
                    break;
                case "odjavaAdmin":
                    $cs -> odjavaAdmin();
                    break;
                case "odjavaKorisnik":
                    $cs -> odjavaKorisnik();
                    break;
                case "korisnikRegistracija":
                    include "../public/registracija.php";
                    break;
                case "kreirajAktivnost":
                    include "../public/kreiranjeAktivnostiStranica.php";
                    break;
                case "odustanakAktivnost":
                    include "../public/glavnaStranica.php";
                    break;
                case "podaciKorisnik":
                    $cs -> getKorisnikById();
                    include "../public/korisnikStranica.php";
                    break;
                case "glavna":
                    include "../public/glavnaStranica.php";
                    break;
                case "detaljnije":
                    $cs -> detaljnije();
                    break;
                case "prikljuceneAktivnosti":
                    $cs -> prikljuceneAktivnosti();
                    break;
            }
        break;

        case "POST":
            switch($action)
            {
                case "korisnikPrijava":
                    $cs -> proveraKorisnik();
                    break;
                case "registracijaKorisnik":
                    $cs -> registracijaKorisnik();
                    break;
                case "brisanje":
                    $cs -> deleteKorisnikById();
                    break;
                case "kreiranjeAktivnosti":
                    $cs -> kreirajAktivnost();
                    break;
                case "izmeni":
                    $cs -> updateKorisnik();
                    break;
                case "pridruziSe":
                    $cs -> pridruziSe();
            }
        break;
    }
?>