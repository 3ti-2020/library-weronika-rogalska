<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $id_autor = $_POST['id_autor'];
    $id_tytul = $_POST['id_tytul'];

    $sql = "INSERT INTO book(id_book, id_autor, id_tytul) VALUES (NULL , '$id_autor', '$id_tytul')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
?>