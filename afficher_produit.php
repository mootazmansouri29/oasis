<?php require_once("partials/navbar.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des Produits</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                        <?php
                        require_once('connexion/connexion.php');

                        function getProduit($pdo, $id)
                        {
                            $sql = "SELECT * FROM Produits WHERE id_produit = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $produit = getProduit($pdo, $id);

                            if ($produit) {
                        ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Produit</th>
                                            <th>Nom Produit</th>
                                            <th>Description</th>
                                            <th>Utilisation</th>
                                            <th>Rendement Moyen</th>
                                            <th>Période de Récolte</th>
                                            <th>Prix</th>
                                            <th>ID Oasis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $produit['id_produit']; ?></td>
                                            <td><?php echo $produit['nom_produit']; ?></td>
                                            <td><?php echo $produit['description']; ?></td>
                                            <td><?php echo $produit['utilisation']; ?></td>
                                            <td><?php echo $produit['rendement_moyen']; ?></td>
                                            <td><?php echo $produit['periode_recolte']; ?></td>
                                            <td><?php echo $produit['prix']; ?></td>
                                            <td><?php echo $produit['id_oasis']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Bouton de retour -->
                                <a href="produits.php" class="btn btn-secondary">Retour</a>
                            <?php
                            } else {
                                echo "Aucun produit trouvé avec cet identifiant.";
                            }
                        } else {
                            echo "Identifiant de produit non spécifié.";
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
