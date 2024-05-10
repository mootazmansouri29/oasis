<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_ressource_eau']) && isset($_POST['source_eau']) && isset($_POST['qualite_eau']) && isset($_POST['quantite_eau']) && isset($_POST['utilisation_eau']) && isset($_POST['id_oasis'])) {
        // Récupère les données du formulaire
        $id_ressource_eau = $_POST['id_ressource_eau'];
        $source_eau = $_POST['source_eau'];
        $qualite_eau = $_POST['qualite_eau'];
        $quantite_eau = $_POST['quantite_eau'];
        $utilisation_eau = $_POST['utilisation_eau'];
        $id_oasis = $_POST['id_oasis'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Ressources_eau SET source_eau = :source_eau, qualite_eau = :qualite_eau, quantite_eau = :quantite_eau, utilisation_eau = :utilisation_eau, id_oasis = :id_oasis WHERE id_ressource_eau = :id_ressource_eau";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':source_eau', $source_eau);
        $stmt->bindParam(':qualite_eau', $qualite_eau);
        $stmt->bindParam(':quantite_eau', $quantite_eau);
        $stmt->bindParam(':utilisation_eau', $utilisation_eau);
        $stmt->bindParam(':id_oasis', $id_oasis);
        $stmt->bindParam(':id_ressource_eau', $id_ressource_eau);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Ressources_eau.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour des ressources en eau.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
