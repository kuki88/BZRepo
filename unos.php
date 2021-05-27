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

        <section class="sekcija berlin-sport">
          <form action="skripta.php" class="forma" method="POST">
            <div class="form-item">
              <label for="naslovClanka">Naslov članka:</label><br>
              <div class="form-field">
                <input type="text" id="naslovClanka" name="naslovClanka"><br/>
              </div>
            </div>

            <div class="form-item">
              <label for="sazetak">Kratki sažetak:</label><br>
              <div class="form-field">
                <textarea id="sazetak" name="sazetak" cols="50" rows="5"></textarea><br/>
              </div>
            </div>

            <div class="form-item">
              <label for="tekst">Sadržaj vijesti:</label><br>
              <div class="form-field">
                <textarea id="tekst" name="tekst" cols="90" rows="10"></textarea>
              </div>
            </div>

            <div class="form-item">
              <label for="kategorijaVijesti">Kategorija:</label>
              <div class="form-field">
                <select name="kategorijaVijesti" id="kategorijaVijesti">              
                  <option value="kultura">Kultur Und Show</option>
                  <option value="sport">Berlin-Sport</option>
                </select><br/>
                </div>
            </div>

            <div class="form-item">
              <label for="img">Slika:</label><br>
              <div class="form-field">
                <input type="file" id="slika" name="slika" accept="image/*" />
              </div>
            </div>

            <div class="form-item">
              <label for="img">Obavijest na stranici:</label>
              <input type="checkbox" name="arhiva" id="arhiva" /><br/>
            </div>

            <div class="form-item">
              <input type="reset" value="Poništi" id="res"/>
              <input type="submit" value="Kreiraj Vijest" id="sub" />
            </div>

          </form>
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