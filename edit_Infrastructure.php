<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des Infrastructure</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        // Vérifier si l'identifiant de l'infrastructure est passé en paramètre GET
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Préparez votre requête SQL pour récupérer les détails de l'infrastructure
                            $sql = "SELECT * FROM Infrastructure WHERE id_infra = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();

                            // Vérifiez s'il y a un résultat
                            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Affichez les détails de l'infrastructure dans un formulaire pour l'édition
                                ?>
                        <form action="update_infrastructures.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom de l'Infrastructure</th>
                                        <th>Description</th>
                                        <th>Type d'Infrastructure</th>
                                        <th>État</th>
                                        <th>Capacité</th>
                                        <th>Date de Construction</th>
                                        <th>Oasis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="nom_infra"
                                                value="<?php echo $row['nom_infra']; ?>"></td>
                                        <td><textarea name="description"
                                                ><?php echo $row['description']; ?></textarea></td>
                                        <td><input type="text" name="type_infra"
                                                value="<?php echo $row['type_infra']; ?>"></td>
                                        <td><input type="text" name="etat"
                                                value="<?php echo $row['etat']; ?>"></td>
                                        <td><input type="text" name="capacite"
                                                value="<?php echo $row['capacite']; ?>"></td>
                                        <td><input type="text" name="date_construction"
                                                value="<?php echo $row['date_construction']; ?>"></td>
                                        <td><input type="text" name="id_oasis"
                                                value="<?php echo $row['id_oasis']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_infra" value="<?php echo $row['id_infra']; ?>">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
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

<?php require_once("partials/footer.php"); ?>
