<?php require_once("partials/navbar.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des données météorologiques</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        function getMeteo($pdo, $id)
                        {
                            $sql = "SELECT * FROM Meteo WHERE id_meteo = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $meteo = getMeteo($pdo, $id);

                            if ($meteo) {
                        ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Météo</th>
                                            <th>Température Moyenne</th>
                                            <th>Humidité Relative</th>
                                            <th>Pluviométrie</th>
                                            <th>Vitesse du Vent</th>
                                            <th>ID Oasis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $meteo['id_meteo']; ?></td>
                                            <td><?php echo $meteo['temperature_moyenne']; ?></td>
                                            <td><?php echo $meteo['humidite_relative']; ?></td>
                                            <td><?php echo $meteo['pluviometrie']; ?></td>
                                            <td><?php echo $meteo['vitesse_vent']; ?></td>
                                            <td><?php echo $meteo['id_oasis']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Bouton de retour -->
                                <a href="meteo.php" class="btn btn-secondary">Retour</a>
                            <?php
                            } else {
                                echo "Aucune donnée météo trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant météo non spécifié.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero -->

<?php require_once("partials/footer.php"); ?>
