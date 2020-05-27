<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';

$conn = new mysqli($servername, $username, $password, $dbname);

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$tytul = $_POST['tytul'];

$sql="INSERT INTO autorzy(id_autor, imie, nazwisko) VALUES (NULL, '$imie', '$nazwisko')";
$sql1 = "INSERT INTO tytuly (id_tytul, tytul) VALUES (NULL, '$tytul')";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql1);

header('Location: index.php');
?>