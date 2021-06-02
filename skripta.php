<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>B.Z. Berlin</title>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2;url=administracija.php">
    </head>

    <body>
        <?php

            include "connect.php";

            if(isset($_POST['naslovClanka']) && isset($_POST['sazetak']) && isset($_POST['tekst'])){
                $naslov = $_POST['naslovClanka'];
                $sazetak = $_POST['sazetak'];
                $tekst = $_POST['tekst'];
                $kategorija = $_POST['kategorijaVijesti'];
                $datum = date('d.m.Y');
                $check = 0;
                $slika = $_FILES['slika']['name'];
                $targer_dir = 'img/'.$slika;
                echo $targer_dir;
                move_uploaded_file($_FILES["slika"]["name"], $target_dir);        

                if(isset($_POST['arhiva'])){
                    $check = 1;  
                }
            }

            $query = "INSERT INTO Vijesti(datum, naslov, sazetak, sadrzaj, slika, kategorija, arhiva)
                    VALUES('$datum', '$naslov', '$sazetak', '$tekst', '$slika', '$kategorija', '$check');";
            $res = mysqli_query($dbc, $query) or die("Error querying database");
            mysqli_close($dbc); 
        ?>

        <div class="header">
            <div class="line"></div>

            <div class="logo"><img src="B.Z..svg.png" alt="Logo"></div>
            <div class="navigationBar">
                <a href="index.php" class="perc1">Home</a>
                <a href="kategorija.php?id=sport"  class="perc3">Berlin-Sport</a>
                <a href="kategorija.php?id=kultura"  class="perc3">Kultur und show</a>
                <a href="administracija.php" class="perc3">Administracija</a>
            </div>

        </div>
        <section role="main">
            <div class="row">
                <p class="category"><?php
                                        echo $kategorija;
                                    ?></p>
                <h1 class="title"><?php
                                        echo $naslov;
                                    ?></h1>
                <p>AUTOR:</p>
                <p>OBJAVLJENO:</p>
            </div>
            <section class="slika">
                <?php
                    echo "<img src='$slika'";
                ?>
            </section>
            <section class="about">
                <p>
                    <?php
                    echo $sazetak;
                    ?>
                </p>
            </section>
            <section class="sadrzaj">
                <p>
                    <?php
                    echo $tekst;
                    ?>
                </p>
            </section>
        </section>

    </body>

</html>