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

        <?php
            session_start();
            include "connect.php";
            define('IMGPATH', 'img/');

            if(isset($_POST['prijavaBtn'])){


                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $korisnickoIme = $_POST['korisnickoIme'];
                $lozinka = $_POST['lozinka1'];
                $hashedLozinka = password_hash($lozinka, CRYPT_BLOWFISH);
                $razina = 0;
                $regKorisnik = false;
    
                $qry = "SELECT * FROM korisnik WHERE korisnickoIme = '$korisnickoIme' LIMIT 1";
    
                $res = mysqli_query($dbc, $qry);

                if(mysqli_num_rows($res) == 1){
                    echo "<script type='text/javascript'>
                            alert('Korisničko ime već postoji!');
                        </script>";
                }
                else{
                    $qry = "INSERT INTO korisnik(ime, prezime, korisnickoIme, lozinka, razina) VALUES(?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
    
                    if(mysqli_stmt_prepare($stmt, $qry)){
                        mysqli_stmt_bind_param($stmt, "ssssi", $ime, $prezime, $korisnickoIme, $hashedLozinka, $razina);
                        mysqli_stmt_execute($stmt);
                        $regKorisnik = true;
                    }
                }
    
                if($regKorisnik == true){
                    echo "Korisnik je uspješno registriran!";
                    $_SESSION['$korisnickoIme'] = $korisnickoIme;
                    $_SESSION['$razina'] = $razina;                    
                }

                mysqli_close($dbc);
    
            }

            if (isset($_SESSION['$korisnickoIme']) && $_SESSION['$razina'] == 0 || isset($_SESSION['$korisnickoIme']) && $_SESSION['$razina'] == 1){
                echo "Već ste registrirani!";
                ?>
                <section class="sekcija">
                    <h2>Već ste registrirani!</h2>
                    <form action="" method="POST">
                        <br/><button id='odjava' name='odjava' type='submit'>Odjavi se!</button>
                    </form>
                </section>
            <?php
                if(isset($_POST['odjava'])){
                    session_destroy();
                }    
            }
            else{

        ?>


        <section class="sekcija">

            <div class="rega" name="rega">
                <form action="" name="prijava" class="formaRega" method="POST">

                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime"/>
                    <span id="errorIme"></span>

                    <label for="prezime">Prezime:</label>
                    <input type="text" name="prezime" id="prezime"/>
                    <span id="errorPrezime"></span>

                    <label for="korisnickoIme">Korisničko Ime:</label>
                    <input type="text" name="korisnickoIme" id="korisnickoIme"/>
                    <span id="errorKorisnicko"></span>

                    <label for="password">Lozinka</label>
                    <input type="password" name="lozinka1" id="lozinka1"/>
                    <span id="errorPass"></span>

                    <label for="password">Ponovite lozinku:</label>
                    <input type="password" name="lozinka2" id="lozinka2"/>
                    <span id="errorPass"></span>

                    <button type="submit" id="prijavaBtn" name="prijavaBtn" value="Registriraj se!">Registriraj se!</button>

                </form>
            </div>

            <?php

                }

            ?>

            <script type="text/javascript">

                document.getElementById("prijavaBtn").onclick = function(event){

                    var slanjeForme = true;

                    //provjera imena
                    var poljeIme = document.getElementById("ime");
                    var vrijednostIme = document.getElementById("ime").value;

                    if(vrijednostIme.length == 0){
                        slanjeForme = false;
                        poljeIme.style.border="1px solid red";
                        document.getElementById("errorIme").innerHTML= "Potrebno je unijeti ime!";
                    }
                    else{
                        poljeIme.style.border="1px solid black";
                        document.getElementById("errorIme").innerHTML="";
                    }


                    
                    //provjera prezimena
                    var poljePrezime = document.getElementById("prezime");
                    var vrijednostPrezime = document.getElementById("prezime").value;

                    if(vrijednostPrezime.length == 0){
                        slanjeForme = false;
                        poljePrezime.style.border="1px solid red";
                        document.getElementById("errorPrezime").innerHTML= "Potrebno je unijeti prezime!";
                    }
                    else{
                        poljePrezime.style.border="1px solid black";
                        document.getElementById("errorPrezime").innerHTML="";
                    }

                    var poljeKorisnicko = document.getElementById("korisnickoIme");
                    var vrijednostKorisnicko = document.getElementById("korisnickoIme").value;

                    if(vrijednostKorisnicko.length == 0){
                        slanjeForme = false;
                        poljeKorisnicko.style.border="1px solid red";
                        document.getElementById("errorKorisnicko").innerHTML= "Potrebno je unijeti korisnicko ime!";
                    }
                    else{
                        poljeKorisnicko.style.border="1px solid black";
                        document.getElementById("errorKorisnicko").innerHTML="";
                    }

                    
                    //provjera passworda
                    var poljePass1 = document.getElementById("lozinka1");
                    var pass1 = document.getElementById("lozinka1").value;
                    var poljePass2 = document.getElementById("lozinka2");
                    var pass2 = document.getElementById("lozinka2").value;
                    if(pass1 != pass2 || pass1.length == 0 || pass2.length == 0){
                        slanjeForme = false;
                        poljePass1.style.border = "1px solid red";
                        poljePass2.style.border = "1px solid red";
                        document.getElementById("errorPass").innerHTML = "Lozinke nisu iste!";
                    }
                    else{
                        poljePass1.style.border="1px solid black";
                        poljePass2.style.border="1px solid black";
                        document.getElementById("errorPass").innerHTML="";
                    }

                    if(slanjeForme != true){
                        event.preventDefault();
                        return false;
                    }


                }
            
            </script>

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