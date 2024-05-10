<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des Cultures</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        // Vérifier si l'identifiant de la culture est passé en paramètre GET
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Préparez votre requête SQL pour récupérer les détails de la culture
                            $sql = "SELECT * FROM Cultures WHERE id_culture = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();

                            // Vérifiez s'il y a un résultat
                            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Affichez les détails de la culture dans un formulaire pour l'édition
                                ?>
                        <form action="update_cultures.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom de la Culture</th>
                                        <th>Description</th>
                                        <th>Rendement Moyen</th>
                                        <th>Période de Récolte</th>
                                        <th>Irrigation Utilisée</th>
                                        <th>Oasis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="nom_culture"
                                                value="<?php echo $row['nom_culture']; ?>"></td>
                                        <td><textarea name="description"
                                                ><?php echo $row['description']; ?></textarea></td>
                                        <td><input type="text" name="rendement_moyen"
                                                value="<?php echo $row['rendement_moyen']; ?>"></td>
                                        <td><input type="text" name="periode_recolte"
                                                value="<?php echo $row['periode_recolte']; ?>"></td>
                                        <td><input type="text" name="irrigation_utilisee"
                                                value="<?php echo $row['irrigation_utilisee']; ?>"></td>
                                        <td><input type="text" name="id_oasis"
                                                value="<?php echo $row['id_oasis']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_culture" value="<?php echo $row['id_culture']; ?>">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
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

<?php require_once("partials/footer.php"); ?>
