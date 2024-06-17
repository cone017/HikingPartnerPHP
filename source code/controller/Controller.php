<?php

    require_once "adminDAO.php";
    require_once "korisnikDAO.php";
    session_start();

    class adminController
    {
        
    function proveraAdmin()
    {
        $korisnickoIme = isset($_POST["korisnickoIme"])?$_POST["korisnickoIme"]:"";
        $lozinka = isset($_POST["lozinka"])?$_POST["lozinka"]:"";

        if(!empty($korisnickoIme)&&!empty($korisnickoIme))
        {
            $dao = new adminDAO();

            $postoji = $dao -> proveraAdmin($korisnickoIme, $lozinka);

            if($postoji)
            {
                $_SESSION["adminIme"] = $korisnickoIme;
                include "../public/adminStranica.php";
            }

            else
            {
               $msg = "Neuspesno prijavljivanje";
                include "../public/pocetna.php";
            }
        }

        else
        {
            $msg = "Morate popuniti korisnicko ime i lozinku";
            include "../public/pocetna.php";
        }
    }

    function proveraKorisnik()
    {
        $mejlAdresa = isset($_POST["korisnickoIme"])?$_POST["korisnickoIme"]:"";
        $sifra = isset($_POST["lozinka"])?$_POST["lozinka"]:"";

        if(!empty($mejlAdresa)&&!empty($sifra))
        {
            $dao = new korisnikDAO();

            $postoji = $dao -> proveraKorisnik($mejlAdresa, $sifra);

            if($postoji)
            {
                $_SESSION["mejlAdresa"] = $mejlAdresa;
                include "../public/korisnikStranica.php";
            }

            else
            {
               $msg = "Neuspesno prijavljivanje";
                include "../public/pocetna.php";
            }
        }

        else
        {
            $msg = "Morate popuniti korisnicko ime i lozinku";
            include "../public/pocetna.php";
        }
    }

    function registracijaKorisnik()
    {
        $imePrezime = isset($_POST["imePrezime"])?$_POST["imePrezime"]:"";
        $mejl = isset($_POST["mejl"])?$_POST["mejl"]:"";
        $sifra = isset($_POST["sifra"])?$_POST["sifra"]:"";
        $telefon = isset($_POST["telefon"])?$_POST["telefon"]:"";
        $pol = isset($_POST["pol"])?$_POST["pol"]:"";
        $interesovanje = isset($_POST["interesovanje"])?$_POST["interesovanje"]:"";

        if(!empty($imePrezime)&&!empty($mejl)&&!empty($sifra)&&!empty($telefon)&&!empty($pol)&&!empty($interesovanje))
        {
            $dao = new korisnikDAO();

            if($dao -> registracijaKorisnik($imePrezime, $mejl, $sifra, $telefon, $pol, $interesovanje))
            {
                $msg = "Uspesno ste se registrovali";
                include "../public/pocetna.php";
            }

            else
            {
                $msg = "Registracija nije uspela";
                include "../public/registracija.php";
            }
        }

        else
        {
            $msg = "Morate popuniti sva polja";
            include "../public/registracija.php";
        }

    }

    function odjavaAdmin()
    {
        if($_SESSION["adminIme"] != "")
        {
            session_unset();
            session_destroy();
            include "../public/pocetna.php";
        }
    }

    function odjavaKorisnik()
    {
        if($_SESSION["mejlAdresa"] != "")
        {
            session_unset();
            session_destroy();
            include "../public/pocetna.php";
        }
    }
}
?>