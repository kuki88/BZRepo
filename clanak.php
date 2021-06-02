<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <link rel="stylesheet" href="clanakstyle.css">
        <title>B.Z. Berlin</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="heder">
            <div class="line"></div>

            <div class="logo"><img src="img/B.Z..svg.png" alt="Logo"></div>
              <div class="navigationBar">
                <a href="index.php" class="perc1">Home</a>
                <a href="kategorija.php?id=sport"  class="perc3">Berlin-Sport</a>
                <a href="kategorija.php?id=kultura"  class="perc3">Kultur und show</a>
                <a href="administracija.php" class="perc3">Administracija</a>
              </div>
     
        </div>

        <section class="clanak">

          <?php
            include "connect.php";
            define('IMGPATH', 'img/');

            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND id=".$_GET["id"]."";
            $result = mysqli_query($dbc, $query);

            $i = 0;

            if($result){

                while($row = mysqli_fetch_array($result)){

                echo "<h1>".$row["naslov"]."</h1>";
                echo "  <img src='".IMGPATH.$row["slika"]."' alt='Clanak slika'>";
                echo "  <hr/>";
                echo "  <div class='content'>
                          <p id='podebljani'>".$row["sazetak"]."
                          </p>
              
                          <p>".$row["sadrzaj"]."</p>         
                        </div>
                    ";
              }
            }

          ?>

          <!-- <h1>Clanak title</h1>

          <img src="img/2637581.jpg" alt="Clanak slika">

          <hr/>

          <div class="content">
            <p id="podebljani">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod              tempor incididunt ut labore et dolore 
              magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
               laboris nisi ut aliquip ex ea commodoconsequat.
            </p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
            
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
            
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>         
          </div> -->

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