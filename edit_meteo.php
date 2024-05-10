<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des Données Météorologiquess</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        // Vérifier si l'identifiant de la météo est passé en paramètre GET
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Préparez votre requête SQL pour récupérer les détails de la météo
                            $sql = "SELECT * FROM Meteo WHERE id_meteo = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();

                            // Vérifiez s'il y a un résultat
                            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Affichez les détails de la météo dans un formulaire pour l'édition
                                ?>
                        <form action="update_meteo.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Température Moyenne</th>
                                        <th>Humidité Relative</th>
                                        <th>Pluviométrie</th>
                                        <th>Vitesse du Vent</th>
                                        <th>Oasis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="temperature_moyenne"
                                                value="<?php echo $row['temperature_moyenne']; ?>"></td>
                                        <td><input type="text" name="humidite_relative"
                                                value="<?php echo $row['humidite_relative']; ?>"></td>
                                        <td><input type="text" name="pluviometrie"
                                                value="<?php echo $row['pluviometrie']; ?>"></td>
                                        <td><input type="text" name="vitesse_vent"
                                                value="<?php echo $row['vitesse_vent']; ?>"></td>
                                        <td><input type="text" name="id_oasis"
                                                value="<?php echo $row['id_oasis']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_meteo" value="<?php echo $row['id_meteo']; ?>">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                        <?php
                            } else {
                                echo "Aucune donnée météorologique trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant de donnée météorologique non spécifié.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
