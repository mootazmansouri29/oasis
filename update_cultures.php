<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_culture']) && isset($_POST['nom_culture']) && isset($_POST['description']) && isset($_POST['rendement_moyen']) && isset($_POST['periode_recolte']) && isset($_POST['irrigation_utilisee']) && isset($_POST['id_oasis'])) {
        // Récupère les données du formulaire
        $id_culture = $_POST['id_culture'];
        $nom_culture = $_POST['nom_culture'];
        $description = $_POST['description'];
        $rendement_moyen = $_POST['rendement_moyen'];
        $periode_recolte = $_POST['periode_recolte'];
        $irrigation_utilisee = $_POST['irrigation_utilisee'];
        $id_oasis = $_POST['id_oasis'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Cultures SET nom_culture = :nom_culture, description = :description, rendement_moyen = :rendement_moyen, periode_recolte = :periode_recolte, irrigation_utilisee = :irrigation_utilisee, id_oasis = :id_oasis WHERE id_culture = :id_culture";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_culture', $nom_culture);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':rendement_moyen', $rendement_moyen);
        $stmt->bindParam(':periode_recolte', $periode_recolte);
        $stmt->bindParam(':irrigation_utilisee', $irrigation_utilisee);
        $stmt->bindParam(':id_oasis', $id_oasis);
        $stmt->bindParam(':id_culture', $id_culture);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Cultures.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la culture.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
