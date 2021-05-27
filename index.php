<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <link rel="stylesheet" href="style.css">
        <title>B.Z. Berlin</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="header">
            <div class="line"></div>

            <div class="logo"><img src="img/B.Z..svg.png" alt="Logo"></div>
              <div class="navigationBar">
                <a href="index.php" class="perc1">Home</a>
                <a href="kategorija.php?id=sport"  class="perc3">Berlin-Sport</a>
                <a href="kategorija.php?id=kultura"  class="perc3">Kultur und show</a>
                <a href="administracija.php" class="perc3">Administracija</a>
              </div>
     
        </div>

        <?php
          include "connect.php";
          define('IMGPATH', 'img/');
        ?>

        <section class="sekcija sport">
          <div class="headerLink">
            <h3><a href="#">BERLIN-SPORT ></a></h3>
          </div>

          <div class="container">
            <?php

              $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
              $result = mysqli_query($dbc, $query);

              $i = 0;

              while($row = mysqli_fetch_array($result)){

                echo "<div class='col-lg-4'>";
                echo "  <img class='card-img-top' src='".IMGPATH.$row['slika']."' alt='Card image cap'>";
                echo "  <div class='card-body'>";
                echo "    <a class='card-title' href='clanak.php?id=".$row['id']."'>".$row['naslov']."</a>";
                echo "    <h5 class='card-text'>".$row['sazetak']."</h5>";
                echo "  </div>";
                echo "</div>";

              }

            ?>
            <div class="row">
              <div class="col-lg-4">
                <img class="card-img-top" src="img/215112.jpg" alt="Card image cap">
                <div class="card-body">
                  <a href="clanak.php" class="card-title">Card title</a>
                  <h5 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h5>
                </div>
              </div>
              <div class="col-lg-4">
                <img class="card-img-top" src="img/215112.jpg" alt="Card image cap">
                <div class="card-body">
                  <a href="clanak.php" class="card-title clanakNaslov">Card title</a>
                  <h5 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h5>
                </div>
              </div>
              <div class="col-lg-4">
                <img class="card-img-top" src="img/215112.jpg" alt="Card image cap">
                <div class="card-body">
                  <a href="clanak.php" class="card-title clanakNaslov">Card title</a>
                  <h5 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h5>
                </div>
              </div>    
            </div>  
          </div>
        </section>

        <section class="sekcija kultur">
          <div class="headerLink">
            <h3><a href="#">KULTUR UND SHOW ></a></h3>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <img class="card-img-top" src="img/215112.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-title">Card title</p>
                  <h5 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h5>
                </div>
              </div>
              <div class="col-lg-4">
                <img class="card-img-top" src="img/215112.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-title">Card title</p>
                  <h5 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h5>
                </div>
              </div>
              <div class="col-lg-4">
                <img class="card-img-top" src="img/215112.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-title">Card title</p>
                  <h5 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h5>
                </div>
              </div>    
            </div>  
          </div>
        </section>

        <footer>
          <div class ="foot">
            <p>Weitere online Angebote</p>
          </div>
          <div class="container">
            <p>&nbsp;</p>
          </div>
        </footer>
    </body>
</html>