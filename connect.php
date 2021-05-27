<?php
    header('Content-Type: text/html; charset=utf-8');

    $imeServera = "localhost";
    $username = "root";
    $password = "123123";
    $basename = "BZBerlin";

    $dbc = mysqli_connect($imeServera, $username, $password, $basename)
            or die("Neuspjesno spajanje na bazu!");


    mysqli_set_charset($dbc, "utf8");

    if($dbc){
        echo "Uspješno spajanje!";
    }
?>