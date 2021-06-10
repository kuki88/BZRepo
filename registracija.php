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
            include "connect.php";
            define('IMGPATH', 'img/');


            if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['korisnickoIme']) && isset($_POST['lozinka1'])){

                echo "Aaaaaa";
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $korisnickoIme = $_POST['korisnickoIme'];
                $lozinka = $_POST['lozinka1'];
                $hashedLozinka = password_hash($lozinka, CRYPT_BLOWFISH);
                $razina = 0;
                $regKorisnik = false;
    
                $qry = "SELECT FROM korisnik WHERE korisnickoIme = ?";
    
                $stmt = mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($stmt, $qry)){
                    mysqli_stmt_bind_param($stmt, 's', $korisnickoIme);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
    
                if(mysqli_stmt_num_rows($stmt) > 0) $poruka = "Korisničko ime već postoji!";
                else{
                    $qry = "INSERT INTO korisnik(ime, prezime, korisnickoIme, lozinka, razina) VALUES(?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
    
                    if(mysqli_stmt_prepare($stmt, $qry)){
                        mysqli_stmt_bind_param($stmt, "ssssi", $ime, $prezime, $korisnickoIme, $hashedLozinka, $razina);
                        mysqli_stmt_execute($stmt);
                        $regKorisnik = true;
                    }
                }
    
                mysqli_close($dbc);
    
                if($regKorisnik == true){
                    echo "Korisnik je uspješno registriran!";
                }
            }
        ?>


        <section class="sekcija">

            <div class="rega" name="rega">
                <form action="" name="prijava" class="formaRega">

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

                    <button type="submit" id="prijava" name="prijava">Prijava</button>

                </form>
            </div>

            <script type="text/javascript">

                var slanjeForme = true;

                function provjeraUneseno(idPolja, porukaError, errorPolje){
                    var polje = document.getElementById(idPolja);
                    var vrijednost = document.getElementById(idPolja).value;

                    if(vrijednost.length == 0){
                        slanjeForme = false;
                        polje.style.border="1px solid red";
                        document.getElementById(errorPolje).innerHTML= porukaError;
                    }
                    else{
                        poljeIme.style.border="1px solid black";
                        document.getElementById(errorPolje).innerHTML="";
                    }

                    return false;
                }

                document.getElementById("prijava").onclick = function(event){

                    //provjera imena
                    provjeraUneseno("ime", "Potrebno je unijeti ime!", "errorIme");
                    
                    //provjera prezimena
                    provjeraUneseno("prezime", "Potrebno je unijeti prezime!", "errorPrezime");
                    
                    //provjera korisnickog imena
                    provjeraUneseno("korisnickoIme", "Potrebno je unijeti korisnicko ime!", "errorKorisnicko");
                    
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
                    }


                    return false;
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