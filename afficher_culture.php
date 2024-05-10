<?php require_once("partials/navbar.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des cultures</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        function getCultures($pdo, $id)
                        {
                            $sql = "SELECT * FROM Cultures WHERE id_culture = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $culture = getCultures($pdo, $id);

                            if ($culture) {
                        ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Culture</th>
                                            <th>Nom Culture</th>
                                            <th>Description</th>
                                            <th>Rendement Moyen</th>
                                            <th>Période de Récolte</th>
                                            <th>Irrigation Utilisée</th>
                                            <th>ID Oasis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $culture['id_culture']; ?></td>
                                            <td><?php echo $culture['nom_culture']; ?></td>
                                            <td><?php echo $culture['description']; ?></td>
                                            <td><?php echo $culture['rendement_moyen']; ?></td>
                                            <td><?php echo $culture['periode_recolte']; ?></td>
                                            <td><?php echo $culture['irrigation_utilisee']; ?></td>
                                            <td><?php echo $culture['id_oasis']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Bouton de retour -->
                                <a href="cultures.php" class="btn btn-secondary">Retour</a>
                            <?php
                            } else {
                                echo "Aucune culture trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant de culture non spécifié.";
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
