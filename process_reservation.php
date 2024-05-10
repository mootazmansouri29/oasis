<?php

require_once('connexion/connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom_client'];
    $email = $_POST['email_client'];
    $telephone = $_POST['telephone_client'];
    $date_reservation = $_POST['date_reservation'];
    $heure_reservation = $_POST['heure_reservation'];
    $nombre_personnes = $_POST['nombre_personnes'];
    $commentaire = $_POST['commentaire'];
    
    try {
        $basePrice = 550;
        $prix = $basePrice + (($nombre_personnes - 1) * $basePrice);

        // Prepare SQL statement
        $sql = "INSERT INTO reservation (nom_client, email_client, telephone_client, date_reservation, heure_reservation, nombre_personnes, prix, commentaire)
                VALUES (:nom, :email, :telephone, :date_reservation, :heure_reservation, :nombre_personnes, :prix, :commentaire)";
        
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':date_reservation', $date_reservation);
        $stmt->bindParam(':heure_reservation', $heure_reservation);
        $stmt->bindParam(':nombre_personnes', $nombre_personnes);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':commentaire', $commentaire);
        
        // Execute the statement
        $stmt->execute();
        
        header("Location: succes.php");
        exit;      
    } catch(PDOException $e) {
        // Handle errors
        echo '<div class="alert alert-danger" role="alert">';
        echo "Erreur : " . $e->getMessage();
        echo '</div>';
    }
    
}
?>
