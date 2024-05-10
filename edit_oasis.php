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

                        // Vérifier si l'identifiant de l'oasis est passé en paramètre GET
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Préparez votre requête SQL pour récupérer les détails de l'oasis
                            $sql = "SELECT * FROM Oasis WHERE id_oasis = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();

                            // Vérifiez s'il y a un résultat
                            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Affichez les détails de l'oasis dans un formulaire pour l'édition
                                ?>
                        <form action="update_oasis.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom de l'Oasis</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Superficie</th>
                                        <th>Population</th>
                                        <th>Altitude</th>
                                        <th>Accès à l'eau</th>
                                        <th>Type d'Oasis</th>
                                        <th>Ville</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="nom_oasis"
                                                value="<?php echo $row['nom_oasis']; ?>"></td>
                                        <td><input type="text" name="latitude"
                                                value="<?php echo $row['latitude']; ?>"></td>
                                        <td><input type="text" name="longitude"
                                                value="<?php echo $row['longitude']; ?>"></td>
                                        <td><input type="text" name="superficie"
                                                value="<?php echo $row['superficie']; ?>"></td>
                                        <td><input type="text" name="population"
                                                value="<?php echo $row['population']; ?>"></td>
                                        <td><input type="text" name="altitude"
                                                value="<?php echo $row['altitude']; ?>"></td>
                                        <td><input type="text" name="acces_eau"
                                                value="<?php echo $row['acces_eau']; ?>"></td>
                                        <td><input type="text" name="type_oasis"
                                                value="<?php echo $row['type_oasis']; ?>"></td>
                                        <td><input type="text" name="id_ville"
                                                value="<?php echo $row['id_ville']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_oasis" value="<?php echo $row['id_oasis']; ?>">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
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

<?php require_once("partials/footer.php"); ?>
