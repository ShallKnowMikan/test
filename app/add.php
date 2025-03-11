<?php
    require './conn.php';

    $nome = $_POST['name'];
    $numero = $_POST['number'];
    $azienda = $_POST['company'];


    $idNumero = 1;
    $idAzienda = 1;

    $query = 'INSERT INTO Users(name,numberId,companyId) VALUES ('.$nome.','.$idNumero.','.$idAzienda.');';

    $conn->query($query);

    exit();
?>