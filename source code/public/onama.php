<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" class="style" />
    <title>O nama</title>

    <style>
        <?php
        require_once("onama/style.css");
        ?>
    </style>
  </head>
  <body>
    <?php
    require_once("partials/navbarOnama.html");
    ?>
    <div class="wrap-color">
    <div class="wrapper">
      <div class="slide-container">
        <div class="slide-content">
          <div class="card-wrapper">
            <div class="card">
              <div class="image-content">
                <span class="overlay"></span>
                <div class="card-image">
                  <img src="../images/myprofile.jpg" alt="" class="card-img" />
                </div>
              </div>
              <div class="card-content">
                <h2 class="name">Krsto Živković</h2>
                <p class="description">Frontend Design & Database</p>
                <button class="button">61/2020</button>
              </div>
            </div>
            <div class="card">
              <div class="image-content">
                <span class="overlay"></span>
                <div class="card-image">
                  <img src="../images/janko.jpg" alt="" class="card-img" />
                </div>
              </div>
              <div class="card-content">
                <h2 class="name">Janko Živaljević</h2>
                <p class="description">Backend & Database</p>
                <button class="button">35/2020</button>
              </div>
            </div>
            <div class="card">
              <div class="image-content">
                <span class="overlay"></span>
                <div class="card-image">
                  <img src="../images/nemanja.jpg" alt="" class="card-img" />
                </div>
              </div>
              <div class="card-content">
                <h2 class="name">Nemanja Mijajlović</h2>
                <p class="description">Backend & Database</p>
                <button class="button">57/2020</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <?php
    require_once("partials/footer.html");
    ?>
  </body>
</html>
