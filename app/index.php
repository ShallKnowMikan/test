<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica</title>
</head>
<body>
    <form action="./add.php">
        <fieldset>
            <legend>Aggiungi contatto</legend>
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Inserire nome" required>
            <br>
            <label for="name">Azienda:</label>
            <input type="text" name="company" placeholder="Nome azienda">
            <br>
            <label for="number">Numero di telefono:</label>
            <input type="text" name="number" pattern="[789][0-9]{9}" placeholder="+39 ">
            <br>
            <input type="submit" value="Invia">
        </fieldset>
    </form>
    <form action="./update.php">
    <fieldset>
            <legend>Modifica contatto</legend>
            <h3>(Per identificare il contatto si usa il nome con il quale e' registrato)</h3>
            <br>
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Inserire nome" required>
            <br>
            <label for="number">Numero:</label>
            <input type="text" name="number" pattern="[789][0-9]{9}" placeholder="+39 ">
            <br>
            <label for="name">Azienda:</label>
            <input type="text" name="company" placeholder="Nome azienda">
            <br>
            <input type="submit" value="Invia">
        </fieldset>
    </form>
    <form action="./remove.php">
        <fieldset>
            <legend>Elimina contatto</legend>
            <h3>(Per identificare il contatto si usa il nome con il quale e' registrato)</h3>
            <br>
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Inserire nome" required>
            <br>
            <label for="number">Numero:</label>
            <input type="text" name="number" pattern="[789][0-9]{9}" placeholder="+39 ">
            <br>
            
            <label for="name">Azienda:</label>
            <input type="text" name="company" placeholder="Nome azienda">
            <br>
            <input type="submit" value="Invia">
        </fieldset>
    </form>

</body>
</html>