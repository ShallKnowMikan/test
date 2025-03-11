<?php
    require './conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica</title>
</head>
<body>
    <form action="./add.php" method="post">
        <fieldset>
            <legend>Aggiungi contatto</legend>
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Inserire nome" required>
            <br>
            <label for="name">Azienda:</label>
            <input type="text" name="company" placeholder="Nome azienda">
            <br>
            <label for="number">Numero di telefono:</label>
            <input type="text" name="number" placeholder="+39 " pattern="^\d+(?:\s+\d+)*$" >
            <br>
            <input type="submit" value="Invia">
        </fieldset>
    </form>
    <form action="./update.php" method="post">
    <fieldset>
            <legend>Modifica contatto</legend>
            <h3>(Per identificare il contatto si usa il nome con il quale e' registrato)</h3>
            <br>
            <label for="name">Vecchio nome:</label>
            <input type="text" name="oldName" placeholder="Inserire nome" required>
            <br>
            <label for="name">Nuovo nome:</label>
            <input type="text" name="newName" placeholder="Inserire nome">
            <br>
            <input type="submit" value="Invia">
        </fieldset>
    </form>
    <form action="./remove.php" method="post">
        <fieldset>
            <legend>Elimina contatto</legend>
            <h3>(Per identificare il contatto si usa il nome con il quale e' registrato)</h3>
            <br>
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Inserire nome" required>
            <br>
            <input type="submit" value="Invia">
        </fieldset>
    </form>
    <br>
    <h3>Lista contatti:</h3>
    <?php
    $query = "
        SELECT 
            c.nome AS contatto, 
            n.numero, 
            a.nome AS azienda
        FROM Contatti c
        INNER JOIN Numeri n ON c.idNumero = n.idNumero
        INNER JOIN Aziende a ON c.idAzienda = a.idAzienda
    ";

    // Preparo ed eseguo la query
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->get_result();

    echo "<ul>";

    if ($result->num_rows === 0) {
        echo"Nessun contatto ancora. . .";
    }
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['contatto'] . " / " . $row['numero'] . " / " . $row['azienda'] . "</li>";
    }

    echo "</ul>";

    // Chiudo lo statement
    $stmt->close();
    ?>


</body>
</html>