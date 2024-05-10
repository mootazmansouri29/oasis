<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_infra']) && isset($_POST['nom_infra']) && isset($_POST['description']) && isset($_POST['type_infra']) && isset($_POST['etat']) && isset($_POST['capacite']) && isset($_POST['date_construction']) && isset($_POST['id_oasis'])) {
        // Récupère les données du formulaire
        $id_infra = $_POST['id_infra'];
        $nom_infra = $_POST['nom_infra'];
        $description = $_POST['description'];
        $type_infra = $_POST['type_infra'];
        $etat = $_POST['etat'];
        $capacite = $_POST['capacite'];
        $date_construction = $_POST['date_construction'];
        $id_oasis = $_POST['id_oasis'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Infrastructure SET nom_infra = :nom_infra, description = :description, type_infra = :type_infra, etat = :etat, capacite = :capacite, date_construction = :date_construction, id_oasis = :id_oasis WHERE id_infra = :id_infra";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_infra', $nom_infra);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type_infra', $type_infra);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':capacite', $capacite);
        $stmt->bindParam(':date_construction', $date_construction);
        $stmt->bindParam(':id_oasis', $id_oasis);
        $stmt->bindParam(':id_infra', $id_infra);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Infrastructure.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'infrastructure.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
