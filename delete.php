<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'library';

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE from book WHERE id_book=".$_POST['id_to_delete'];

    mysqli_query($conn, $sql);

    header('Location: index.php');

?>