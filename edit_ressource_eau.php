<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des Ressources_eau</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        // Vérifier si l'identifiant de la ressource en eau est passé en paramètre GET
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Préparez votre requête SQL pour récupérer les détails de la ressource en eau
                            $sql = "SELECT * FROM Ressources_eau WHERE id_ressource_eau = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();

                            // Vérifiez s'il y a un résultat
                            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Affichez les détails de la ressource en eau dans un formulaire pour l'édition
                                ?>
                        <form action="update_ressources_eau.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Source d'Eau</th>
                                        <th>Qualité de l'Eau</th>
                                        <th>Quantité d'Eau</th>
                                        <th>Utilisation de l'Eau</th>
                                        <th>Oasis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="source_eau"
                                                value="<?php echo $row['source_eau']; ?>"></td>
                                        <td><input type="text" name="qualite_eau"
                                                value="<?php echo $row['qualite_eau']; ?>"></td>
                                        <td><input type="text" name="quantite_eau"
                                                value="<?php echo $row['quantite_eau']; ?>"></td>
                                        <td><input type="text" name="utilisation_eau"
                                                value="<?php echo $row['utilisation_eau']; ?>"></td>
                                        <td><input type="text" name="id_oasis"
                                                value="<?php echo $row['id_oasis']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_ressource_eau" value="<?php echo $row['id_ressource_eau']; ?>">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
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

<?php require_once("partials/footer.php"); ?>
