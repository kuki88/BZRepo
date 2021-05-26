<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>B.Z. Berlin</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <?php

            if(isset($_POST['naslovClanka']) && isset($_POST['sazetak']) && isset($_POST['tekst'])){
                if(isset($_POST['img'])) $slika = $_POST['img'];
                $naslov = $_POST['naslovClanka'];
                $sazetak = $_POST['sazetak'];
                $tekst = $_POST['tekst'];

                $kategorija = $_POST['kategorijaVijesti'];
                $check = $_POST['arhiva'];  
            }
            function potvrda(){
                    $naslov = $_POST['naslovClanka'];
                    $sazetak = $_POST['sazetak'];
                    $tekst = $_POST['tekst'];

                    $kategorija = $_POST['kategorijaVijesti'];
                    $check = $_POST['arhiva'];
                }
        ?>

        <div class="header">
            <div class="line"></div>

            <div class="logo"><img src="B.Z..svg.png" alt="Logo"></div>
            <div class="navigationBar">
                <a href="index.html" class="perc1">Home</a>
                <a href="#" class="perc3">Berlin-Sport</a>
                <a href="#" class="perc3">Kultur und show</a>
                <a href="unos.html" class="perc3">Administracija</a>
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