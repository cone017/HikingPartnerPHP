<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    <?php
    require_once("home/style.css");
    ?>
</style>
<body>
    <div class="div-wrapper">
        <?php
        require_once("partials/navbarHome.html");
        ?>
              <div class="wrapper-heading">
        <h1><b>Postanite deo Hiking Partner tima! Dobrodošli! (:</b></h1>
      </div>

      <?php
      require_once("partials/footerHome.html");
      
      ?>
        <form method="GET">
          <input type="submit" name="action" class="btn" value="gostPrijava">
        </form>
    </div>

    <script>
        <?php
        require_once("home/script.js");
        ?>
    </script>

</body>
</html>