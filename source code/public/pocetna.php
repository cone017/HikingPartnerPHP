<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <style>
        <?php
        require_once("pocetna/style.css");
        ?>
    </style>
</head>
<body>
    <div class="div-wrapper">
    <?php
    require_once("partials/navbarOnama.html");
    ?>
    <div class="form-box">
        <div class="login-container" id="login">

        
        <div class="top">
            <span>Nemate kreiran nalog?<a href="../public/registracija.php" onclick="register()">Registruj se</a></span>
            <header>Prijavi se</header>
        </div>
    <form method="POST" class="two-forms" id="loginForm">
        <div class="input-box">
        <input type="text" name="korisnickoIme" class="input-field" placeholder="Uneti email adresu...">
        <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
        <input type="password" name="lozinka" class="input-field" placeholder="Uneti lozinku...">&nbsp;
        <i class="bx bx-lock-alt"></i>
        <label class="label-password"><input type="checkbox" id="show-password">Prikaži lozinku</label>
        
        </div>
        <div class="input-box">
        <input type="submit" name="action" value="Prijava" class="submit">
        </div>
        <div class="two-col">
            <div class="two">
                <label><a href="#"><b>*Forma za prijavu admina i posetilaca</b></a></label>
            </div>
        </div>
        </div>
    </form>
<!-- <label>
            <input type="checkbox" id="show-password"> Show Password
        </label> -->
    <!-- <form method="GET">
        <input type="submit" name="action" value="korisnikRegistracija" style="margin-left: 5px;">
        <input type="submit" name="action" value="gostPrijava" style="margin-left: 5px;">
    </form> -->
    </div>
    <?php
    require_once("partials/footer.html");
    ?>


<script>
    <?php
    require_once("pocetna/script.js");
    ?>
</script>
    </div>

    


 


   
    
</body>
</html>
