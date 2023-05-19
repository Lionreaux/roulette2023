<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

// Connexion à la base de données
$conn = generateMysqliConnexion();

// Requête pour récupérer les données de la table Etudiants
$stmt = $conn->prepare("SELECT id, statut, note FROM Etudiants WHERE note IS NOT NULL");
$stmt->execute();
$result = $stmt->get_result();

// Parcours des résultats de la requête
while ($row = $result->fetch_assoc()) {
    $idEtudiant = $row['id'];
    $statut = $row['statut'];
    $note = $row['note'];

    // Mise à jour de la colonne dernierCours avec la valeur de la colonne statut
    $stmt = $conn->prepare("UPDATE Etudiants SET dernierCours = ? WHERE id = ?");
    $stmt->bind_param("si", $statut, $idEtudiant);
    $stmt->execute();

    // Vidage de la colonne statut
    $stmt = $conn->prepare("UPDATE Etudiants SET statut = NULL WHERE id = ?");
    $stmt->bind_param("i", $idEtudiant);
    $stmt->execute();

    // Mise à jour de la note dans la table NotesEtudiants
    $stmt = $conn->prepare("SELECT maximum, note FROM NotesEtudiants WHERE etudiant_id = ?");
    $stmt->bind_param("i", $idEtudiant);
    $stmt->execute();
    $resultNote = $stmt->get_result();

    if ($resultNote->num_rows > 0) {
        // L'étudiant a déjà une entrée dans la table NotesEtudiants, mise à jour de la note existante
        $rowNote = $resultNote->fetch_assoc();
        $maximum = $rowNote['maximum'];
        $oldNote = $rowNote['note'];
        $newNote = $note + $oldNote;
        $newMaximum = $maximum + 5; // Ajout de 5 au maximum

        $stmt = $conn->prepare("UPDATE NotesEtudiants SET note = ?, maximum = ? WHERE etudiant_id = ?");
        $stmt->bind_param("iii", $newNote, $newMaximum, $idEtudiant);
        $stmt->execute();
    } else {
        // L'étudiant n'a pas encore d'entrée dans la table NotesEtudiants, insertion d'une nouvelle ligne
        $newMaximum = 5; // set du maximum a 5
        $newNote = $note;

        $stmt = $conn->prepare("INSERT INTO NotesEtudiants (etudiant_id, maximum, note) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $idEtudiant, $newMaximum, $newNote);
        $stmt->execute();
    }

    // Réinitialisation de la note dans la table Etudiants
    $stmt = $conn->prepare("UPDATE Etudiants SET note = NULL WHERE id = ?");
    $stmt->bind_param("i", $idEtudiant);
    $stmt->execute();
}

// Fermeture de la connexion à la base de données
$conn->close();
