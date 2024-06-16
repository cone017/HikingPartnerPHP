<?php

    $action = isset($_REQUEST["action"])?$_REQUEST["action"]:"";
    require_once "adminController.php";

    $cs = new adminController();

    switch($_SERVER["REQUEST_METHOD"])
    {
        case "GET":
            switch($action)
            {
                case "pocetna":
                    include "../public/pocetna.php";
                    break;
                case "adminOdjava":
                    $cs -> adminOdjava();
                    break;
            }
        break;

        case "POST":
            switch($action)
            {
                case "adminPrijava":
                    $cs -> proveraAdmin();
                    break;
            }
        break;
    }
?>