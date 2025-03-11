<?php
require './conn.php';

// Recupera i dati dal form
$nome = $_POST['name'];
$numero = str_replace(' ', '', $_POST['number']);
$azienda = $_POST['company'];

try {
    // Inizia la transazione
    $conn->begin_transaction();

    // Gestione del numero
    $stmt = $conn->prepare("SELECT idNumero FROM Numeri WHERE numero = ?");
    $stmt->bind_param("s", $numero);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $idNumero = $row["idNumero"];
    } else {
        $stmt = $conn->prepare("INSERT INTO Numeri(numero) VALUES (?)");
        $stmt->bind_param("s", $numero);
        $stmt->execute();
        $idNumero = $conn->insert_id;
    }

    // Gestione dell'azienda
    $stmt = $conn->prepare("SELECT idAzienda FROM Aziende WHERE nome = ?");
    $stmt->bind_param("s", $azienda);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $idAzienda = $row["idAzienda"];
    } else {
        $stmt = $conn->prepare("INSERT INTO Aziende(nome) VALUES (?)");
        $stmt->bind_param("s", $azienda);
        $stmt->execute();
        $idAzienda = $conn->insert_id;
    }

    // Inserimento del contatto
    $stmt = $conn->prepare("INSERT INTO Contatti(nome, idNumero, idAzienda) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $nome, $idNumero, $idAzienda);
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
