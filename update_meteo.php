<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['id_meteo']) && isset($_POST['temperature_moyenne']) && isset($_POST['humidite_relative']) && isset($_POST['pluviometrie']) && isset($_POST['vitesse_vent']) && isset($_POST['id_oasis'])) {
        // Récupère les données du formulaire
        $id_meteo = $_POST['id_meteo'];
        $temperature_moyenne = $_POST['temperature_moyenne'];
        $humidite_relative = $_POST['humidite_relative'];
        $pluviometrie = $_POST['pluviometrie'];
        $vitesse_vent = $_POST['vitesse_vent'];
        $id_oasis = $_POST['id_oasis'];

        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE Meteo SET temperature_moyenne = :temperature_moyenne, humidite_relative = :humidite_relative, pluviometrie = :pluviometrie, vitesse_vent = :vitesse_vent, id_oasis = :id_oasis WHERE id_meteo = :id_meteo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':temperature_moyenne', $temperature_moyenne);
        $stmt->bindParam(':humidite_relative', $humidite_relative);
        $stmt->bindParam(':pluviometrie', $pluviometrie);
        $stmt->bindParam(':vitesse_vent', $vitesse_vent);
        $stmt->bindParam(':id_oasis', $id_oasis);
        $stmt->bindParam(':id_meteo', $id_meteo);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:Meteo.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour des données météorologiques.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
