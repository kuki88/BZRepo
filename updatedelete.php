<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="refresh" content="2;url=administracija.php">
    </head>

    <body>
        <?php

            include "connect.php";
            define('IMGPATH', 'img/');

            if(isset($_POST['delete'])){
                $id = $_POST['id'];
                $query = "DELETE FROM Vijesti WHERE id = $id";
                $result = mysqli_query($dbc, $query) or die("Error querying database");
            }

            if(isset($_POST['update'])){
                $slika = $_FILES['slika']['name'];
                $naslov = $_POST['naslov'];
                $sazetak = $_POST['sazetak'];
                $sadrzaj = $_POST['sadrzaj'];
                $kategorija = $_POST['kategorija'];
                $id=$_POST['id'];
                $arhiva = 0;

                if(isset($_POST['arhiva'])) $arhiva = 1;

                $target_dir = 'img/'.$slika;
                move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);

                $query = "UPDATE vijesti
                SET naslov='$naslov', sazetak='$sazetak', sadrzaj='$sadrzaj', 
                slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id='$id' ";

                $result = mysqli_query($dbc, $query) or die("Error querying db!");
            }

        ?>
    </body>

</html>
