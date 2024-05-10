<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_ville']) && isset($_POST['nom_ville']) && isset($_POST['code_postal'])) {
        // Récupère les données du formulaire
        $id_ville = $_POST['id_ville'];
        $nom_ville = $_POST['nom_ville'];
        $code_postal = $_POST['code_postal'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Villes SET nom_ville = :nom_ville, code_postal = :code_postal WHERE id_ville = :id_ville";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_ville', $nom_ville);
        $stmt->bindParam(':code_postal', $code_postal);
        $stmt->bindParam(':id_ville', $id_ville);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Villes.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la ville.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
