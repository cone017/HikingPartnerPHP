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

                $id = $dao -> getKorisnikIdByEmail($mejlAdresa);

                if($postoji)
                {
                    $_SESSION["mejlAdresa"] = $mejlAdresa;
                    $_SESSION["aktivnosti"] = $aktivnost -> getAll();
                    $_SESSION["korisnikId"] = $id;
                    $_SESSION["korisnik"] = $dao -> getKorisnikById(7);
                    include "../public/glavnaStranica.php";
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
        $korisnik = new korisnikDAO();
        $_SESSION["korisnik"] = $korisnik -> getKorisnikById($_SESSION["korisnikId"]);
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

    function updateKorisnik()
    {
        $imePrezime = isset($_POST["imePrezimeUpdate"])?$_POST["imePrezimeUpdate"]:"";
        $mejl = isset($_POST["mejlAdresaUpdate"])?$_POST["mejlAdresaUpdate"]:"";
        $sifra = isset($_POST["sifraUpdate"])?$_POST["sifraUpdate"]:"";
        $telefon = isset($_POST["telefonUpdate"])?$_POST["telefonUpdate"]:"";
        $pol = isset($_POST["polUpdate"])?$_POST["polUpdate"]:"";
        $interesovanje = isset($_POST["interesovanjeUpdate"])?$_POST["interesovanjeUpdate"]:"";
        $id = isset($_SESSION["korisnik"]["korisnikId"])?$_SESSION["korisnik"]["korisnikId"]:"";

        if(!empty($imePrezime)&&!empty($mejl)&&!empty($sifra)&&!empty($telefon)&&!empty($pol)&&!empty($interesovanje))
        {   
            $dao = new korisnikDAO();

            $izmenjen = $dao -> updateKorisnik($imePrezime, $mejl, $sifra, $telefon, $pol, $interesovanje, $id); 

            if($izmenjen)
            {
                $_SESSION["korisnik"] = $dao -> getKorisnikById($_SESSION["korisnikId"]);
                $msg = "Uspesno izmenjen korisnik ".$izmenjen;
                include "../public/korisnikStranica.php";
            }

            else
            {
                $_SESSION["korisnik"] = $dao -> getKorisnikById($_SESSION["korisnikId"]);
                $msg = "Nije uspelo update-ovanje korisnika ".$izmenjen." nesto";
                include "../public/korisnikStranica.php";
            }
              
        }

        else
        {    
            $msg = "Morate popuniti sva polja";
            include "../public/korisnikStranica.php";
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

    function kreirajAktivnost()
    {
        $nazivAktivnosti = isset($_POST["nazivAktivnosti"])?$_POST["nazivAktivnosti"]:"";
        $datumPocetka = isset($_POST["datumPocetka"])?$_POST["datumPocetka"]:"";
        $trajanje = isset($_POST["trajanje"])?$_POST["trajanje"]:"";
        $opis = isset($_POST["opis"])?$_POST["opis"]:"";
        $lokacija = isset($_POST["lokacija"])?$_POST["lokacija"]:"";
        $tipAktivnosti = isset($_POST["tipAktivnosti"])?$_POST["tipAktivnosti"]:"";

        if(!empty($nazivAktivnosti)&&!empty($datumPocetka)&&!empty($trajanje)&&!empty($opis)&&!empty($lokacija)&&!empty($tipAktivnosti))
        {
            $dao = new aktivnostDAO();

            if($dao -> insertAktivnost($nazivAktivnosti, $datumPocetka, $trajanje, $opis, $lokacija, $tipAktivnosti, $_SESSION["korisnikId"]))
            {
                $msg = "Uspesno ste dodali aktivnost";
                $_SESSION["aktivnosti"] = $dao -> getAll();
                include "../public/kreiranjeAktivnostiStranica.php";
            }

            else
            {
                $msg = "Nije uspelo kreiranje aktivnosti";
                include "../public/kreiranjeAktivnostiStranica.php";
            }
        }

        else
        {
            $msg = "Morate popuniti sva polja";
            include "../public/kreiranjeAktivnostiStranica.php";
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