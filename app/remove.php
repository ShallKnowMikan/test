<?php
require './conn.php';

// Recupera i dati dal form
$nome = $_POST['name'];

try {
    // Inizia la transazione
    $conn->begin_transaction();

    // Rimozione del contatto
    $stmt = $conn->prepare("DELETE FROM Contatti WHERE nome = ?;");
    $stmt->bind_param("s", $nome);
    $stmt->execute();

    // Conferma la transazione
    $conn->commit();
} catch (Exception $e) {
    // In caso di errore, effettua il rollback
    $conn->rollback();
    // Gestisci l'errore (ad esempio, loggalo o mostra un messaggio all'utente)
    error_log("Errore durante l'inserimento del contatto: " . $e->getMessage());
    echo "Si è verificato un errore durante l'inserimento del contatto.";
}

// Chiudi la connessione
$conn->close();
header('Location: ./index.php');
exit();
?>
