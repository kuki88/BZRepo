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
                <a href="kategorija.php?id=sport" class="perc3">Berlin-Sport</a>
                <a href="kategorija.php?id=kultura" class="perc3">Kultur und show</a>
                <a href="administracija.php" class="perc3">Administracija</a>
            </div>

        </div>



        <section class="sekcija">

            <div class="rega" name="rega">
                <form action="" name="prijava" class="formaRega">

                    <label for="korisnickoIme">Korisničko Ime:</label>
                    <input type="text" name="korisnickoIme" id="korisnickoIme"/>
                    <span id="errorKorisnicko"></span>

                    <label for="password">Lozinka</label>
                    <input type="password" name="lozinka1" id="lozinka1"/>
                    <span id="errorPass"></span>

                    <button type="submit" name="prijavaBtn">Prijava</button>

                    <button id="myButton" class=>Registriraj se</button>

                </form>
            </div>

        </section>
        <footer>
            <div class="foot">
                <p>Weitere online Angebote</p>
            </div>
            <div class="container">
                <p>&nbsp;</p>
            </div>
        </footer>
    </body>

</html>

