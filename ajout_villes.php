<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                        <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des villes</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <?php
                            require_once('connexion/connexion.php');
                            $nom_ville = $code_postal = "";
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nom_ville = htmlspecialchars($_POST['nom_ville']);
                                $code_postal = htmlspecialchars($_POST['code_postal']);

                                $sql = "INSERT INTO Villes (nom_ville, code_postal) VALUES (:nom_ville, :code_postal)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':nom_ville', $nom_ville);
                                $stmt->bindParam(':code_postal', $code_postal);
                                if ($stmt->execute()) {
                                    header("Location: villes.php");
                                    exit();
                                } else {
                                    echo "Erreur lors de l'ajout de la ville.";
                                }
                            }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom de la Ville</th>
                                            <th>Code Postal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" id="nom_ville" name="nom_ville" required></td>
                                            <td><input type="text" id="code_postal" name="code_postal" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="villes.php" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
