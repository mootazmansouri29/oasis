<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                        <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Ajouter une Ressource en Eau</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <?php
                            require_once('connexion/connexion.php');
                            $source_eau = $qualite_eau = $quantite_eau = $utilisation_eau = $id_oasis = "";
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $source_eau = htmlspecialchars($_POST['source_eau']);
                                $qualite_eau = htmlspecialchars($_POST['qualite_eau']);
                                $quantite_eau = htmlspecialchars($_POST['quantite_eau']);
                                $utilisation_eau = htmlspecialchars($_POST['utilisation_eau']);
                                $id_oasis = htmlspecialchars($_POST['id_oasis']);

                                $sql = "INSERT INTO Ressources_eau (source_eau, qualite_eau, quantite_eau, utilisation_eau, id_oasis) 
                                        VALUES (:source_eau, :qualite_eau, :quantite_eau, :utilisation_eau, :id_oasis)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':source_eau', $source_eau);
                                $stmt->bindParam(':qualite_eau', $qualite_eau);
                                $stmt->bindParam(':quantite_eau', $quantite_eau);
                                $stmt->bindParam(':utilisation_eau', $utilisation_eau);
                                $stmt->bindParam(':id_oasis', $id_oasis);
                                if ($stmt->execute()) {
                                    header("Location: ressources_eau.php");
                                    exit();
                                } else {
                                    echo "Erreur lors de l'ajout de la ressource en eau.";
                                }
                            }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Source d'Eau</td>
                                            <td><input type="text" id="source_eau" name="source_eau" required></td>
                                        </tr>
                                        <tr>
                                            <td>Qualité de l'Eau</td>
                                            <td><input type="text" id="qualite_eau" name="qualite_eau" required></td>
                                        </tr>
                                        <tr>
                                            <td>Quantité d'Eau</td>
                                            <td><input type="number" step="0.01" id="quantite_eau" name="quantite_eau" required></td>
                                        </tr>
                                        <tr>
                                            <td>Utilisation de l'Eau</td>
                                            <td><input type="text" id="utilisation_eau" name="utilisation_eau" required></td>
                                        </tr>
                                        <tr>
                                            <td>ID Oasis</td>
                                            <td><input type="number" id="id_oasis" name="id_oasis" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="ressources_eau.php" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
