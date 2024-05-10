<?php require_once("partials/navbar.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des oasis</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        function getOasis($pdo, $id)
                        {
                            $sql = "SELECT * FROM Oasis WHERE id_oasis = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $oasis = getOasis($pdo, $id);

                            if ($oasis) {
                        ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Oasis</th>
                                            <th>Nom Oasis</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Superficie</th>
                                            <th>Population</th>
                                            <th>Altitude</th>
                                            <th>Accès Eau</th>
                                            <th>Type Oasis</th>
                                            <th>ID Ville</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $oasis['id_oasis']; ?></td>
                                            <td><?php echo $oasis['nom_oasis']; ?></td>
                                            <td><?php echo $oasis['latitude']; ?></td>
                                            <td><?php echo $oasis['longitude']; ?></td>
                                            <td><?php echo $oasis['superficie']; ?></td>
                                            <td><?php echo $oasis['population']; ?></td>
                                            <td><?php echo $oasis['altitude']; ?></td>
                                            <td><?php echo $oasis['acces_eau']; ?></td>
                                            <td><?php echo $oasis['type_oasis']; ?></td>
                                            <td><?php echo $oasis['id_ville']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Bouton de retour -->
                                <a href="oasis.php" class="btn btn-secondary">Retour</a>
                            <?php
                            } else {
                                echo "Aucune oasis trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant d'oasis non spécifié.";
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
