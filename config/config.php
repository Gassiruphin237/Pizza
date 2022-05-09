<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_pizza";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
    die("Message d'erreur:" . mysqli_connect_error());
    }
?>