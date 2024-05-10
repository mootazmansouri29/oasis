<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_produit']) && isset($_POST['nom_produit']) && isset($_POST['description']) && isset($_POST['utilisation']) && isset($_POST['rendement_moyen']) && isset($_POST['periode_recolte']) && isset($_POST['prix']) && isset($_POST['id_oasis'])) {
        // Récupère les données du formulaire
        $id_produit = $_POST['id_produit'];
        $nom_produit = $_POST['nom_produit'];
        $description = $_POST['description'];
        $utilisation = $_POST['utilisation'];
        $rendement_moyen = $_POST['rendement_moyen'];
        $periode_recolte = $_POST['periode_recolte'];
        $prix = $_POST['prix'];
        $id_oasis = $_POST['id_oasis'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Produits SET nom_produit = :nom_produit, description = :description, utilisation = :utilisation, rendement_moyen = :rendement_moyen, periode_recolte = :periode_recolte, prix = :prix, id_oasis = :id_oasis WHERE id_produit = :id_produit";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_produit', $nom_produit);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':utilisation', $utilisation);
        $stmt->bindParam(':rendement_moyen', $rendement_moyen);
        $stmt->bindParam(':periode_recolte', $periode_recolte);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':id_oasis', $id_oasis);
        $stmt->bindParam(':id_produit', $id_produit);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Produits.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du produit.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
