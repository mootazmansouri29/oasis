<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_oasis']) && isset($_POST['nom_oasis']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['superficie']) && isset($_POST['population']) && isset($_POST['altitude']) && isset($_POST['acces_eau']) && isset($_POST['type_oasis']) && isset($_POST['id_ville'])) {
        // Récupère les données du formulaire
        $id_oasis = $_POST['id_oasis'];
        $nom_oasis = $_POST['nom_oasis'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $superficie = $_POST['superficie'];
        $population = $_POST['population'];
        $altitude = $_POST['altitude'];
        $acces_eau = $_POST['acces_eau'];
        $type_oasis = $_POST['type_oasis'];
        $id_ville = $_POST['id_ville'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Oasis SET nom_oasis = :nom_oasis, latitude = :latitude, longitude = :longitude, superficie = :superficie, population = :population, altitude = :altitude, acces_eau = :acces_eau, type_oasis = :type_oasis, id_ville = :id_ville WHERE id_oasis = :id_oasis";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_oasis', $nom_oasis);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        $stmt->bindParam(':superficie', $superficie);
        $stmt->bindParam(':population', $population);
        $stmt->bindParam(':altitude', $altitude);
        $stmt->bindParam(':acces_eau', $acces_eau);
        $stmt->bindParam(':type_oasis', $type_oasis);
        $stmt->bindParam(':id_ville', $id_ville);
        $stmt->bindParam(':id_oasis', $id_oasis);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Oasis.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'oasis.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
