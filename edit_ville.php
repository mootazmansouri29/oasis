<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des Villes</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        // Vérifier si l'identifiant de la ville est passé en paramètre GET
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Préparez votre requête SQL pour récupérer les détails de la ville
                            $sql = "SELECT * FROM Villes WHERE id_ville = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();

                            // Vérifiez s'il y a un résultat
                            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Affichez les détails de la ville dans un formulaire pour l'édition
                                ?>
                        <form action="update_villes.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom de la Ville</th>
                                        <th>Code Postal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="nom_ville"
                                                value="<?php echo $row['nom_ville']; ?>"></td>
                                        <td><input type="text" name="code_postal"
                                                value="<?php echo $row['code_postal']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_ville" value="<?php echo $row['id_ville']; ?>">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                        <?php
                            } else {
                                echo "Aucune ville trouvée avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant de ville non spécifié.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
