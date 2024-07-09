<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
        <?php
        require_once("saznaj_vise/style.css");
        ?>
    </style>
    <title>Korisnički profil</title>
  </head>
  <body>
    <div class="all-wrapper">
    <?php
    require_once("partials/navbarAktivnosti.html");
    ?>
      <div class="wrapper">
        <div class="left">
          <img src="../images/info.png" alt="user" width="40" />
          <h4>Informacije o aktivnosti</h4>
          <form method="POST">
            <input type="submit" name="action" value="pridruziSe">
          </form>
          <br>
          <form method="GET">
            <input type="submit" name="action" value="Odustani">
          </form>

          <?php
            require_once ("../controller/aktivnostDAO.php");
            $aktivnostDAO = new aktivnostDAO();
            $aktivnost = $aktivnostDAO -> getAktivnostById($_SESSION["aktivnostId"])
          ?>
        </div>
        <div class="right">
          <div class="info">
            <h3>Detaljnije</h3>
            
            <div class="info_data">
              <div class="data">
                <!-- nazivAktivnosti -->
                <h4 style="text-transform: uppercase">Naziv aktivnosti:</h4>
                <p style="margin-top: 5px" name=""><?=$aktivnost["nazivAktivnosti"];?></p>
              </div>
              <div class="data">
                <!-- datumPocetka -->
                <h4 style="text-transform: uppercase">Datum:</h4>
                <p style="margin-top: 5px"><?=$aktivnost["datumPocetka"];?></p>
              </div>
              <div class="data">
                <h4 style="text-transform: uppercase">Trajanje:</h4>
                <p style="margin-top: 5px"><?=$aktivnost["trajanje"];?></p>
              </div>
              <div class="data">
                <h4 style="text-transform: uppercase">Opis:</h4>
                <p style="margin-top: 5px"><?=$aktivnost["opis"];?></p>
              </div>
              <div class="data">
                <h4 style="text-transform: uppercase">Lokacija:</h4>
                <p style="margin-top: 5px"><?=$aktivnost["lokacija"];?></p>
              </div>
            </div>
          </div>

          <div class="projects">
            
            <h3>Pridruženi članovi</h3>
            <?php 
            $msg = isset($msg)?$msg:"";
            echo $msg."<br>"."Clanovi ove aktivnosti:<br>";
            
            foreach($_SESSION["clanovi"] as $row)
            {
              echo "Ime:".$row["pridruzeniClan"]."<br>";
            }
            
            //var_dump($_SESSION["clanovi"])
            ?>
            <div class="projects_data">
              <div class="data">
                <div class="input-content">
                  <label class="labels"></label>
                </div>
                <div class="input-content">
                  <label class="labels"></label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php
    require_once("partials/footer.html");
    ?>
    </div>

    <!-- partial -->
  </body>
</html>
