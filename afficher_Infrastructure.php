<?php require_once("partials/navbar.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des infrastructures</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        function getInfrastructure($pdo, $id)
                        {
                            $sql = "SELECT * FROM Infrastructure WHERE id_infra = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $infra = getInfrastructure($pdo, $id);

                            if ($infra) {
                        ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Infrastructure</th>
                                            <th>Nom Infrastructure</th>
                                            <th>Description</th>
                                            <th>Type Infrastructure</th>
                                            <th>État</th>
                                            <th>Capacité</th>
                                            <th>Date de Construction</th>
                                            <th>ID Oasis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $infra['id_infra']; ?></td>
                                            <td><?php echo $infra['nom_infra']; ?></td>
                                            <td><?php echo $infra['description']; ?></td>
                                            <td><?php echo $infra['type_infra']; ?></td>
                                            <td><?php echo $infra['etat']; ?></td>
                                            <td><?php echo $infra['capacite']; ?></td>
                                            <td><?php echo $infra['date_construction']; ?></td>
                                            <td><?php echo $infra['id_oasis']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Bouton de retour -->
                                <a href="infrastructures.php" class="btn btn-secondary">Retour</a>
                            <?php
                            } else {
                                echo "Aucune infrastructure trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant d'infrastructure non spécifié.";
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
