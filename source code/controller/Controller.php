<?php

    require_once "korisnikDAO.php";
    require_once "aktivnostDAO.php";
    session_start();

    class adminController
    {

    function proveraKorisnik()
    {
        $mejlAdresa = isset($_POST["korisnickoIme"])?$_POST["korisnickoIme"]:"";
        $sifra = isset($_POST["lozinka"])?$_POST["lozinka"]:"";

        $aktivnost = new aktivnostDAO();

        if(!empty($mejlAdresa)&&!empty($sifra))
        {

            if($mejlAdresa == "admin" && $sifra == "admin")
            {
                
                $korisnik = new korisnikDAO();

                $_SESSION["aktivnosti"] = $aktivnost -> getAll();
                $_SESSION["korisnici"] = $korisnik -> getAll();

                include "../public/adminStranica.php";
            }
            else
            {
                $dao = new korisnikDAO();

                $postoji = $dao -> proveraKorisnik($mejlAdresa, $sifra);

                if($postoji)
                {
                    $_SESSION["mejlAdresa"] = $mejlAdresa;
                    $_SESSION["aktivnosti"] = $aktivnost -> getAll();
                    include "../public/korisnikStranica.php";
                }

                else
                {
                    $msg = "Neuspesno prijavljivanje";
                    include "../public/pocetna.php";
                }
            }
        }

        else
        {
            $msg = "Morate popuniti korisnicko ime i lozinku";
            include "../public/pocetna.php";
        }
    }

    function getKorisnikById()
    {
        $id = isset($_POST["korisnikId"])?$_POST["korisnikId"]:"";

        $korisnik = new korisnikDAO();

        $_SESSION["korisnik"] = $korisnik -> getKorisnikById($id);
    }

    function deleteKorisnikById()
    {
        $id = isset($_POST["korisnikId"])?$_POST["korisnikId"]:"";

        $korisnik = new korisnikDAO();
        $aktivnost = new aktivnostDAO();

        $obrisan = $korisnik -> deleteKorisnikById($id);

        if($obrisan)
        {
            $msg = "Uspesno obrisan korisnik";
            $_SESSION["korisnici"] = $korisnik -> getAll();
            $_SESSION["aktivnosti"] = $aktivnost -> getAll();
            include "../public/adminStranica.php";
        }

        else
        {
            $msg = "Brisanje nije uspelo";
            include "../public/adminStranica.php";
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
            session_unset();
            session_destroy();
            include "../public/pocetna.php";
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