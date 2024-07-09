<?php $msg = isset($msg)?$msg:""; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        require_once("registracija/style.css");
        ?>
    </style>
</head>
<body>
    <div class="div-wrapper">
    <?php
    require_once("partials/navbarOnama.html");
    ?>
       <div class="form-box">
          <div class="register-container">
          <div class="top">
            <span
              >Imate već nalog?
              <a href="../public/pocetna.php" onclick="login()">Prijavi se!</a></span
            >
            <header>Registracija</header>
          </div>
          <form method="POST" id="registrationForm" class="two-forms">
    <div class="input-box">
        <input type="text" name="imePrezime" class="input-field" placeholder="Uneti ime i prezime...">
    </div>
    <div class="input-box">
        <input type="text" name="mejl" class="input-field" placeholder="Uneti email adresu...">
    </div>
    <div class="input-box">
        <input type="text" name="telefon" class="input-field" placeholder="Uneti broj telefona...">
    </div>
    <div class="input-box">
        <label for="" class="labelfirstgender">Pol:</label>
        <label for="option1" class="labelgender">muški</label>
        <input type="radio" name="pol" value="muski" id="option1" class="input-field-radio">
        <label for="option2" class="labelgender">ženski</label>
        <input type="radio" name="pol" value="zenski" id="option2" class="input-field-radio">
    </div>
    <div class="input-box">
        <label for="" class="labelfirstgender">Interesovanja:</label>
        <label for="option1" class="labelactivity">Planinarenje</label>
        <input type="radio" name="interesovanje" value="planinarenje" class="input-field-radio" id="option1">
        <label for="option2" class="labelactivity">Biciklizam</label>
        <input type="radio" name="interesovanje" value="biciklizam" id="option2" class="input-field-radio">
        <label for="option3" class="labelactivity">Trčanje</label>
        <input type="radio" name="interesovanje" value="trcanje" id="option3" class="input-field-radio">
    </div>
    <div class="input-box">
        <input type="password" name="lozinka" class="input-field" placeholder="Uneti lozinku...">
    </div>
    <!-- <div class="input-box"> -->
        <input type="submit" class="submit" name="action" value="registracija">
    <!-- </div> -->
</form>

    <?php
        $msg = isset($msg)?$msg:"";
        echo "<p class='message'>$msg</p>";
    ?>
    <!-- <form method="GET">
        <button type="submit" name="action" value="pocetna">Odustanak</button>
    </form> -->
    
          </div>  


    </div>



    <?php
    require_once("partials/footer.html");
    ?>
     </div>
     
     <script>
        <?php
        require_once("registracija/script.js");
        ?>
     </script>

</body>
</html>