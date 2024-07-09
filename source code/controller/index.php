<?php

    $action = isset($_REQUEST["action"])?$_REQUEST["action"]:"";
    require_once "Controller.php";

    $cs = new adminController();

    switch($_SERVER["REQUEST_METHOD"])
    {
        case "GET":
            switch($action)
            {
                case "home":
                    include "../public/home.php";
                    break;
                case "pocetna":
                    include "../public/pocetna.php";
                    break;
                case "Odjava admin":
                    $cs -> odjavaAdmin();
                    break;
                case "Aktivnosti":
                    $cs -> dostupneAktivnosti();
                    break;
                case "Odjava korisnik":
                    $cs -> odjavaKorisnik();
                    break;
                case "korisnikRegistracija":
                    include "../public/registracija.php";
                    break;
                case "Kreiraj aktivnost":
                    include "../public/kreiranjeAktivnostiStranica.php";
                    break;
                case "Odustani":
                    include "../public/glavnaStranica.php";
                    break;
                case "Korisnik":
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
                case "gostPrijava":
                    include "../public/gost.php";
                    //$cs -> gostPrijava();
                    break;
                case "page-nr":
                    $cs->getAllPagination();
                    include "../public/glavnaStranica.php";
                    break;
                case "omiljena":
                    $cs ->getInteresovanje();
                    include "../public/filtriraneAktivnosti.php";
                    break;
                
            }
        break;
 
        case "POST":
            switch ($action) {
                case "registracija":
                    $cs->registracijaKorisnik();
                    break;
                case "Prijava":
                    $cs->getAllPagination();
                    $cs->proveraKorisnik();
                    break;
                case "brisanje":
                    $cs->deleteKorisnikById();
                    break;
                case "Kreiraj aktivnost":
                    $cs->kreirajAktivnost();
                    break;
                case "izmeni":
                    $cs->updateKorisnik();
                    break;  
                case "pridruziSe":
                    $cs->pridruziSe();
                    break; 
            }
            break;
        }
        
?>