<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                        <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Ajouter une Infrastructure</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <?php
                            require_once('connexion/connexion.php');
                            $nom_infra = $description = $type_infra = $etat = $capacite = $date_construction = $id_oasis = "";
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nom_infra = htmlspecialchars($_POST['nom_infra']);
                                $description = htmlspecialchars($_POST['description']);
                                $type_infra = htmlspecialchars($_POST['type_infra']);
                                $etat = htmlspecialchars($_POST['etat']);
                                $capacite = htmlspecialchars($_POST['capacite']);
                                $date_construction = htmlspecialchars($_POST['date_construction']);
                                $id_oasis = htmlspecialchars($_POST['id_oasis']);

                                $sql = "INSERT INTO Infrastructure (nom_infra, description, type_infra, etat, capacite, date_construction, id_oasis) 
                                        VALUES (:nom_infra, :description, :type_infra, :etat, :capacite, :date_construction, :id_oasis)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':nom_infra', $nom_infra);
                                $stmt->bindParam(':description', $description);
                                $stmt->bindParam(':type_infra', $type_infra);
                                $stmt->bindParam(':etat', $etat);
                                $stmt->bindParam(':capacite', $capacite);
                                $stmt->bindParam(':date_construction', $date_construction);
                                $stmt->bindParam(':id_oasis', $id_oasis);
                                if ($stmt->execute()) {
                                    header("Location: infrastructures.php");
                                    exit();
                                } else {
                                    echo "Erreur lors de l'ajout de l'infrastructure.";
                                }
                            }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nom de l'Infrastructure</td>
                                            <td><input type="text" id="nom_infra" name="nom_infra" required></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td><textarea id="description" name="description" rows="3" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Type d'Infrastructure</td>
                                            <td><input type="text" id="type_infra" name="type_infra" required></td>
                                        </tr>
                                        <tr>
                                            <td>État</td>
                                            <td><input type="text" id="etat" name="etat" required></td>
                                        </tr>
                                        <tr>
                                            <td>Capacité</td>
                                            <td><input type="number" id="capacite" name="capacite" required></td>
                                        </tr>
                                        <tr>
                                            <td>Date de Construction</td>
                                            <td><input type="date" id="date_construction" name="date_construction" required></td>
                                        </tr>
                                        <tr>
                                            <td>ID Oasis</td>
                                            <td><input type="number" id="id_oasis" name="id_oasis" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="Infrastructure.php" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
