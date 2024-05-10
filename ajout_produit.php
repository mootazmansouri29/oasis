<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                        <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Ajouter un Produit</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <?php
                            require_once('connexion/connexion.php');
                            $nom_produit = $description = $utilisation = $rendement_moyen = $periode_recolte = $prix = $id_oasis = "";
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nom_produit = htmlspecialchars($_POST['nom_produit']);
                                $description = htmlspecialchars($_POST['description']);
                                $utilisation = htmlspecialchars($_POST['utilisation']);
                                $rendement_moyen = htmlspecialchars($_POST['rendement_moyen']);
                                $periode_recolte = htmlspecialchars($_POST['periode_recolte']);
                                $prix = htmlspecialchars($_POST['prix']);
                                $id_oasis = htmlspecialchars($_POST['id_oasis']);

                                $sql = "INSERT INTO Produits (nom_produit, description, utilisation, rendement_moyen, periode_recolte, prix, id_oasis) 
                                        VALUES (:nom_produit, :description, :utilisation, :rendement_moyen, :periode_recolte, :prix, :id_oasis)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':nom_produit', $nom_produit);
                                $stmt->bindParam(':description', $description);
                                $stmt->bindParam(':utilisation', $utilisation);
                                $stmt->bindParam(':rendement_moyen', $rendement_moyen);
                                $stmt->bindParam(':periode_recolte', $periode_recolte);
                                $stmt->bindParam(':prix', $prix);
                                $stmt->bindParam(':id_oasis', $id_oasis);
                                if ($stmt->execute()) {
                                    header("Location: produits.php");
                                    exit();
                                } else {
                                    echo "Erreur lors de l'ajout du produit.";
                                }
                            }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nom du Produit</td>
                                            <td><input type="text" id="nom_produit" name="nom_produit" required></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td><textarea id="description" name="description" rows="3" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Utilisation</td>
                                            <td><input type="text" id="utilisation" name="utilisation" required></td>
                                        </tr>
                                        <tr>
                                            <td>Rendement Moyen</td>
                                            <td><input type="number" step="0.01" id="rendement_moyen" name="rendement_moyen" required></td>
                                        </tr>
                                        <tr>
                                            <td>Période de Récolte</td>
                                            <td><input type="text" id="periode_recolte" name="periode_recolte" required></td>
                                        </tr>
                                        <tr>
                                            <td>Prix</td>
                                            <td><input type="number" step="0.01" id="prix" name="prix" required></td>
                                        </tr>
                                        <tr>
                                            <td>ID Oasis</td>
                                            <td><input type="number" id="id_oasis" name="id_oasis" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="produits.php" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
