<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'library';

    $conn = new mysqli($servername, $username, $password, $dbname);

    $results = $conn -> query('SELECT id_book, imie, nazwisko, tytul FROM autorzy, book, tytuly WHERE book.id_autor=autorzy.id_autor and book.id_tytul=tytuly.id_tytul');

    echo("<table class='moja_tabelka'>");
    echo("<tr>
    <th>id_book</th>
    <th>imie</th>
    <th>nazwisko</th>
    <th>tytuł</th>
    </tr>");

    while($row = $results -> fetch_assoc()){
        echo("<tr>");
        echo("<td>".$row['id_book']."</td>");
            echo("<td>".$row['imie']."</td>");
            echo("<td>".$row['nazwisko']."</td>");
            echo("<td>".$row['tytul']."</td>");
            echo("<td>
        <form action='delete.php' method='POST'>
        <input style='display: none' name='id_to_delete' value=".$row['id_book'].">
        <input type='submit' value='delete'>
        </form>
        </td>");
        echo("</tr>");
    };

    echo("</table>");
    ?>

</form>
</body>
</html>