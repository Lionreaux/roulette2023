<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

class Eleve
{
    public function statutEtudiant($statut, $nom, $note, $classe)
    {
        $conn = generateMysqliConnexion();

        $stmt = $conn->prepare("SELECT id FROM Classes WHERE nom = ?");
        $stmt->bind_param("s", $classe);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idClasse);
            $stmt->fetch();
        }

        try {
            error_log($nom);
            $stmt = $conn->prepare("UPDATE Etudiants SET statut = ?, note = ? WHERE nom = ? AND classe = ?;");
            $stmt->bind_param('sisi', $statut, $note, $nom, $idClasse);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function rezClasse()
    {
        $conn = generateMysqliConnexion();
        $nom = $_GET['classe'];
        $stmt = $conn->prepare("UPDATE Etudiants SET note = NULL, statut = '';");
        $stmt->execute();
        $result = storeResultInArray($stmt);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function getEtudiants()
    {
        error_log("boubou");
        $conn = generateMysqliConnexion();
        $idClasse = $_GET['idClasse'];
        error_log($idClasse);
        $stmt = $conn->prepare("SELECT E.nom FROM Etudiants E WHERE E.classe=?;");
        $stmt->bind_param("i", $idClasse);
        $stmt->execute();
        $result = storeResultInArray($stmt);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function getAbsent($idClasse, $statut)
    {
        $conn = generateMysqliConnexion();
        error_log($idClasse);
        error_log($statut);
        error_log("JE PASSE LA");

        $stmt = $conn->prepare("SELECT E.nom FROM Etudiants E WHERE E.classe=? AND E.dernierCours=?;");
        $stmt->bind_param("is", $idClasse, $statut);
        $stmt->execute();
        $result = storeResultInArray($stmt);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
}

/** Utilisation de la classe Eleve
$eleve = new Eleve();
$eleve->statutEtudiant($statut, $nom, $note, $classe);
$eleve->rezClasse();
$eleve->getEtudiants();
$eleve->getAbsent($idClasse, $statut);*/
