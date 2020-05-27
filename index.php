<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<p>
    <form action="in.php" method="POST">
        <input type="text" name="imie" placeholder="imie">
        <input type="text" name="nazwisko" placeholder="nazwisko">
        <input type="text" name="tytul" placeholder="tytul">
        <input type="submit">
    </form>
</p>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'library';

    $conn = new mysqli($servername, $username, $password, $dbname);

    $result1 = $conn -> query("SELECT * FROM autorzy");

    echo("<form action='insert.php' method='POST'>");
        echo("<select name='id_autor'>");
        while($row = $result1 -> fetch_assoc() ){
            echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
        }
        echo("</select>");

    $result2 = $conn -> query("SELECT * FROM tytuly");

        echo("<select name='id_tytul'>");
         while($row = $result2 -> fetch_assoc()){
            echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
        }
        echo("</select>");

        echo("<input type='submit' value='dodaj'>");
    echo("</form>");

    $results3 = $conn -> query('SELECT id_book, imie, nazwisko, tytul FROM autorzy, book, tytuly WHERE book.id_autor=autorzy.id_autor and book.id_tytul=tytuly.id_tytul');

    echo("<table class='moja_tabelka'>");
    echo("<tr>
    <th>id_book</th>
    <th>imie</th>
    <th>nazwisko</th>
    <th>tytuł</th>
    </tr>");

    while($row = $results3 -> fetch_assoc()){
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
</body>
</html>