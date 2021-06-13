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
        ?>


        <section class="sekcija">

        <?php
            $uspjesnaPrijava = false;
            $admin = false;

            if(isset($_POST['prijavaBtn'])){

                $imeKorisnika = $_POST["korisnickoIme"];
                $lozinkaKorisnika = $_POST["lozinka"];

                $qry = "SELECT korisnickoIme, lozinka, razina FROM korisnik
                        WHERE korisnickoIme = ?";

                $stmt = mysqli_stmt_init($dbc);

                if(mysqli_stmt_prepare($stmt, $qry)){
                    mysqli_stmt_bind_param($stmt, 's', $imeKorisnika);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                mysqli_stmt_fetch($stmt);

                if(password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt)>0){
                    $uspjesnaPrijava = true;
                    if($levelKorisnika == 1) $admin = true;
                    else $admin = false;

                    $_SESSION['$korisnickoIme'] = $imeKorisnika;
                    $_SESSION['$razina'] = $levelKorisnika;

                }
                else {
                    echo "Neuspješna prijava!";
                }
            }

        ?>


        <?php

            if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$korisnickoIme'])) && $_SESSION['$razina'] == 1){
                
                echo '<a href="unos.php" value="Kreiraj Vijest" id="sub">Stvori novi članak!</a>';

                $query = "SELECT * FROM vijesti";
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result)) {

                    echo '<form enctype="multipart/form-data" action="updatedelete.php" class="forma" method="POST">
                    <div class="form-item">
                        <label for="title">Naslov vjesti:</label>
                        <div class="form-field">
                            <input type="text" name="naslov" class="form-field-textual" value="' . $row['naslov'] . '">
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 50
                            znakova):</label>
                        <div class="form-field">
                            <textarea name="sazetak" id="" cols="30" rows="10" class="formfield-textual">' . $row['sazetak'] . '</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="sadrzaj" id="" cols="30" rows="10" class="formfield-textual">' . $row['sadrzaj'] . '</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="pphoto">Slika:</label>
                        <div class="form-field">14
                            <input type="file" class="input-text" id="slika" value="' . $row['slika'] . '" name="slika" accept="image/*"/> <br><img src="' . IMGPATH .
                        $row['slika'] . '" width=100px>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="kategorija">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="kategorija" id="" class="form-field-textual" value="' . $row['kategorija'] . '">    
                                <option value="sport">Sport</option>
                                <option value="kultura">Kultura</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-item">
                        <label>Spremiti u arhivu:
                            <div class="form-field">';
                    if ($row['arhiva'] == 0) {
                        echo '<input type="checkbox" name="arhiva" id="arhiva" />
                                Arhiviraj?';
                    } else {
                        echo '<input type="checkbox" name="arhiva" id="arhiva" checked /> Arhiviraj?';
                    }
                    echo '</div>
                        </label>
                    </div>
                    </div>
                    <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '">
                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" name="update" value="Prihvati">Izmijeni</button>
                        <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                    </div>
                </form>';
                }
            }
            else if($uspjesnaPrijava == true && $admin == false){
                echo "Dobrodošao ".$imeKorisnika." !. Uspješno si prijavljen, ali nisi administrator.";
            }
            else if (isset($_SESSION['$korisnickoIme']) && $_SESSION['$razina'] == 0){
                echo "Dobrodošao ".$_SESSION['$korisnickoIme']."! Uspješno si prijavljen, ali nisi administrator.";
                ?>
                    <form action="" method="POST">
                        <br/><button id='odjava' name='odjava' type='submit'>Odjavi se!</button>
                    </form>
                <?php
                
            }
            else if($uspjesnaPrijava == false){
        ?>
                <div class="rega" name="rega">
                    <form action="" name="prijava" class="formaRega" method="POST">

                        <label for="korisnickoIme">Korisničko Ime:</label>
                        <input type="text" name="korisnickoIme" id="korisnickoIme"/>
                        <span id="errorKorisnicko"></span>

                        <label for="password">Lozinka:</label>
                        <input type="password" name="lozinka" id="lozinka"/>
                        <span id="errorPass"></span>

                        <button type="submit" name="prijavaBtn" id="prijavaBtn">Prijava</button>

                        <button type="submit" name="rega">Registriraj se</button>
                    </form>
                </div>      

            <script type="text/javascript">
            
                document.getElementById("prijavaBtn").onclick = function(event){
                    var slanjeForme = true;

                    var poljeKorisnicko = document.getElementById('korisnickoIme');
                    var korisnicko = document.getElementById('korisnickoIme').value;

                    if(korisnicko.length == 0){
                        slanjeForme = false;
                        poljeKorisnicko.style.border = "1px solid red";
                        document.getElementById("errorKorisnicko").innerHTML = "Morate unijeti korisnicko ime";
                    }

                    var poljePass = document.getElementById('lozinka');
                    var pass = document.getElementById('lozinka').value;

                    if(pass.length == 0){
                        slanjeForme = false;
                        poljePass.style.border = "1px solid red";
                        document.getElementById("errorPass").innerHTML = "Morate unijeti lozinku!";
                    }

                    if(slanjeForme != true){
                        event.preventDefault();
                        return false;
                    }
                }
            
            </script>

        <?php
            }

            if(isset($_POST['odjava'])){
                session_destroy();
            }   
            
            if(isset($_POST['rega'])){
                echo "<script>window.location.href = 'http://localhost/BZberlin/BZberlin/registracija.php';</script>";
            }

        ?>
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