<?php
require './conn.php';

$oldName = $_POST['oldName'];
$newName = $_POST['newName'];

try {
    $conn->begin_transaction();

    $query = 'UPDATE Contatti SET nome = ? WHERE nome = ?;';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss',$newName,$oldName);
    $stmt->execute();
    $stmt->close();

   $conn->commit();
   echo "Contatto aggiornato correttamente.";
   
} catch (Exception $e) {

    $conn->rollback();
    error_log("Errore durante l'aggiornamento del contatto: " . $e->getMessage());
    echo "Si è verificato un errore durante l'aggiornamento del contatto.";
}

$conn->close();
header('Location: ./index.php');
exit();
?>