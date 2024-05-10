<?php require_once("partials/navbar.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des ressources en eau</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        function getRessourceEau($pdo, $id)
                        {
                            $sql = "SELECT * FROM Ressources_eau WHERE id_ressource_eau = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $ressource_eau = getRessourceEau($pdo, $id);

                            if ($ressource_eau) {
                        ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Ressource en Eau</th>
                                            <th>Source Eau</th>
                                            <th>Qualité Eau</th>
                                            <th>Quantité Eau</th>
                                            <th>Utilisation Eau</th>
                                            <th>ID Oasis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $ressource_eau['id_ressource_eau']; ?></td>
                                            <td><?php echo $ressource_eau['source_eau']; ?></td>
                                            <td><?php echo $ressource_eau['qualite_eau']; ?></td>
                                            <td><?php echo $ressource_eau['quantite_eau']; ?></td>
                                            <td><?php echo $ressource_eau['utilisation_eau']; ?></td>
                                            <td><?php echo $ressource_eau['id_oasis']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Bouton de retour -->
                                <a href="ressources_eau.php" class="btn btn-secondary">Retour</a>
                            <?php
                            } else {
                                echo "Aucune ressource en eau trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant de ressource en eau non spécifié.";
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
