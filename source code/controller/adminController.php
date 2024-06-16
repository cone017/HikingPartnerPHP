<?php

    require_once "adminDAO.php";
    session_start();

    class adminController
    {
        function proveraAdmin()
    {
        $korisnickoIme = isset($_POST["korisnickoIme"])?$_POST["korisnickoIme"]:"";
        $lozinka = isset($_POST["lozinka"])?$_POST["lozinka"]:"";

        if(!empty($korisnickoIme)&&!empty($korisnickoIme))
        {
            $dao = new DAO();

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

    function adminOdjava()
    {
        if($_SESSION["adminIme"] != "")
        {
            session_unset();
            session_destroy();
            include "../public/pocetna.php";
        }
    }
}
?>