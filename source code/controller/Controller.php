<?php

    require_once "korisnikDAO.php";
    require_once "aktivnostDAO.php";
    require_once "clanoviAktivnostDAO.php";

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
                $daoClanovi = new clanoviAktivnostDAO();

                $idAktivnosti = $dao -> getAktivnostId($datumPocetka, $trajanje);

                if($daoClanovi -> insertClanoviAktivnost($_SESSION["korisnikId"], $idAktivnosti, $nazivAktivnosti, $_SESSION["korisnik"]["imePrezime"]))
                {
                    $msg = "Uspesno ste dodali aktivnost";
                    $_SESSION["aktivnosti"] = $dao -> getAll();
                    include "../public/kreiranjeAktivnostiStranica.php";
                } 
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

    function detaljnije()
    {
        $dao = new clanoviAktivnostDAO();

        $id = isset($_GET["aktivnostId"])?$_GET["aktivnostId"]:"";
        setcookie("poslednja", $id, time() + 50, "/",);
        $_SESSION["aktivnostId"] = $id;
        $_SESSION["clanovi"] = $dao -> getClanovi($id);
        include "../public/detaljnije.php";
    }

    function pridruziSe()
    {
        $dao = new clanoviAktivnostDAO();

        $postoji = $dao -> korisnikPostoji($_SESSION["korisnikId"], $_SESSION["aktivnostId"]);

        if($postoji)
        {
            $msg = "Vec ste clan ove aktivnosti";
            include "../public/detaljnije.php";
        }

        else
        {
            $aktivnostDAO = new aktivnostDAO();

            $aktivnost = $aktivnostDAO -> getAktivnostById($_SESSION["aktivnostId"]);

            $korisnikDAO = new korisnikDAO();

            $ime = $korisnikDAO -> getKorisnikById($_SESSION["korisnikId"]);

            if($dao -> insertClanoviAktivnost($_SESSION["korisnikId"], $_SESSION["aktivnostId"], $aktivnost["nazivAktivnosti"], $ime["imePrezime"]))
            {
                $msg = "Uspesno ste se prijavili na ovu aktivnost";
                $_SESSION["clanovi"] = $dao -> getClanovi($aktivnost["aktivnostId"]);
                include "../public/detaljnije.php";
            }

            else
            {
                $msg = "Greska pri prijavi na ovu aktivnost";
                include "../public/detaljnije.php";
            }
        }
    }

    function prikljuceneAktivnosti()
    {
        $dao = new clanoviAktivnostDAO();

        $_SESSION["prikljuceneAktivnosti"] = $dao -> prikljuceneAktivnosti($_SESSION["korisnikId"]);

        if(!empty($_SESSION["prikljuceneAktivnosti"]))
        {
            $msg = "korisnik je clan neke aktivnosti";
            include "../public/prikljuceneAktivnosti.php";
        }

        else
        {
            $msg = "nema";
            include "../public/glavnaStranica.php";
        }
    }

    function getAllPagination()
    {
        $dao = new aktivnostDAO();

        if(isset($_GET["page-nr"]))
        {
            $page = $_GET["page-nr"] - 1;
            $start = $page * 2;
            $_SESSION["limit"] = $dao -> getAllPagination($start, 2);
        }

        else {
            $_SESSION["limit"] = $dao->getAllPagination(0, 2);
        }
    }

    function gostPrijava()
    {
        $aktivnost = new aktivnostDAO();

        $_SESSION["aktivnosti"] = $aktivnost -> getAll();
        include "../public/glavnaStranica.php";
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