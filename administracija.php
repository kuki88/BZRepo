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
        ?>


        <section class="sekcija">

            <div class="unos">
                <a href="unos.php" value="Kreiraj Vijest" id="sub">Stvori novi clanak!</a>
            </div>

            <?php
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