<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <link rel="stylesheet" href="style.css">
        <title>B.Z. Berlin</title>
        <meta charset="UTF-8">
        <script type="text/javascript"></script>
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
          <form action="skripta.php" class="forma" method="POST" enctype='multipart/form-data'>
            <div class="form-item">
              <label for="naslovClanka">Naslov članka:</label><br>
              <div class="form-field">
                <input type="text" id="naslovClanka" name="naslovClanka"><br/>
                <span id="errorNaslov" class="bojaPoruke"></span>
              </div>
            </div>

            <div class="form-item">
              <label for="sazetak">Kratki sažetak:</label><br>
              <div class="form-field">
                <textarea id="sazetak" name="sazetak" cols="50" rows="5"></textarea><br/>
                <span id="errorSazetak" class="bojaPoruke"></span>
              </div>
            </div>

            <div class="form-item">
              <label for="tekst">Sadržaj vijesti:</label><br>
              <div class="form-field">
                <textarea id="tekst" name="tekst" cols="90" rows="10"></textarea><br/>
                <span id="errorSadrzaj" class="bojaPoruke"></span>
              </div>
            </div>

            <div class="form-item">
              <label for="kategorijaVijesti">Kategorija:</label>
              <div class="form-field">
                <select name="kategorijaVijesti" id="kategorijaVijesti">
                  <option value="" selected disabled hidden>Odaberite kategoriju...</option>              
                  <option value="kultura">Kultur Und Show</option>
                  <option value="sport">Berlin-Sport</option>
                </select><br/>
                <span id="errorKategorija" class="bojaPoruke"></span>
                </div>
            </div>

            <div class="form-item">
              <label for="img">Slika:</label><br>
              <div class="form-field">
                <input type="file" id="slika" name="slika" accept="image/*" />
              </div>
              <span id="errorSlika" class="bojaPoruke"></span>
            </div>

            <div class="form-item">
              <label for="arhiva">Arhiviraj:</label>
              <input type="checkbox" name="arhiva" id="arhiva" /><br/>
            </div>

            <div class="form-item">
              <input type="reset" value="Poništi" id="res"/>
              <input type="submit" value="Kreiraj Vijest" id="sub" />
            </div>

          </form>
        </section>

        <script>
          document.getElementById("sub").onclick = function () {
            var slanje = true;

            //provjera naslova (5 - 30)
            var poljeNaslov = document.getElementById('naslovClanka');
            var naslov = document.getElementById('naslovClanka').value;

            if(naslov.length < 5 || naslov.length > 30){
              slanje = false;
              poljeNaslov.style.border = "1px solid red";
              document.getElementById("errorNaslov").innerHTML = "Naslov mora imati između 5 i 30 znakova!";
            }


            //provjera sazetka (10 - 100))
            var poljeSazetak = document.getElementById('sazetak');
            var sazetak = document.getElementById('sazetak').value;

            if(sazetak.length < 10 || sazetak.length > 100){
              slanje = false;
              poljeSazetak.style.border = "1px solid red";
              document.getElementById("errorSazetak").innerHTML = "Sažetak mora imati između 10 i 100 znakova!";
            }

            //provjera je li unesen sadrzaj
            var poljeSadrzaj = document.getElementById('tekst');
            var sadrzaj = document.getElementById('tekst').value;

            if(sadrzaj.length == 0){
              slanje = false;
              poljeSadrzaj.style.border = "1px solid red";
              document.getElementById("errorSadrzaj").innerHTML = "Sadržaj se mora unijeti!";
            }

            //provjera je li unesena slika
            var poljeSlika = document.getElementById('slika');
            var slika = document.getElementById('slika').value;

            if(slika.length == 0){
              slanje = false;
              poljeSlika.style.border = "1px solid red";
              document.getElementById("errorSlika").innerHTML = "Slika mora biti unesena!";
            }

            //provjera je li oznacena kategorija
            var poljeKat = document.getElementById('kategorijaVijesti');
            var kategorija = document.getElementById('kategorijaVijesti').value;

            if(document.getElementById('kategorijaVijesti')){
              slanje = false;
              poljeKat.style.border = "1px solid red";
              document.getElementById("errorKategorija").innerHTML = "Kategorija mora biti odabrana!";
            }

            if(slanje != true){
              event.preventDefault();
            }
          }
        </script>

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