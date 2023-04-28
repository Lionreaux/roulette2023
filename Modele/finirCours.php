<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

// Connexion à la base de données
$conn = generateMysqliConnexion();

// Requête pour récupérer les données de la table etudiants
$stmt = $conn->prepare("SELECT id, statut FROM Etudiants");
$stmt->execute();
$result = $stmt->get_result();

// Parcours des résultats de la requête
while ($row = $result->fetch_assoc()) {
    $idEtudiant = $row['id'];
    $statut = $row['statut'];

    // Mise à jour de la colonne dernierCours avec la valeur de la colonne statut
    $stmt = $conn->prepare("UPDATE Etudiants SET dernierCours = ? WHERE id = ?");
    $stmt->bind_param("si", $statut, $idEtudiant);
    $stmt->execute();

    // Vidage de la colonne statut
    $stmt = $conn->prepare("UPDATE Etudiants SET statut = NULL WHERE id = ?");
    $stmt->bind_param("i", $idEtudiant);
    $stmt->execute();
}

// Fermeture de la connexion à la base de données
$conn->close();
