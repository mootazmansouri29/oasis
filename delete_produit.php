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

            // Vérifier si l'identifiant du produit est passé en paramètre GET
            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              // Préparez votre requête SQL pour récupérer les détails du produit
              $sql = "SELECT * FROM Produits WHERE id_produit = :id";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':id', $id);
              $stmt->execute();

              // Vérifiez s'il y a un résultat
              if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Affichez les détails du produit dans un formulaire pour la confirmation de la suppression
                ?>
                <h2>Voulez-vous vraiment supprimer le produit suivant ?</h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom du produit</th>
                      <th>Description</th>
                      <th>Utilisation</th>
                      <th>Rendement moyen</th>
                      <th>Période de récolte</th>
                      <th>Prix</th>
                      <th>Oasis</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $row['nom_produit']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td><?php echo $row['utilisation']; ?></td>
                      <td><?php echo $row['rendement_moyen']; ?></td>
                      <td><?php echo $row['periode_recolte']; ?></td>
                      <td><?php echo $row['prix']; ?></td>
                      <td><?php echo $row['id_oasis']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <form action="delete_confirm_produits.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id_produit']; ?>">
                  <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                  <a href="produits.php" class="btn btn-secondary">Annuler</a>
                </form>
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

<!-- Footer Section -->
<?php require_once("partials/footer.php"); ?>
