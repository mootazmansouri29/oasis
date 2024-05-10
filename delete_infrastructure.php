<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des infrastructures</h1>
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
                // Affichez les détails de l'infrastructure dans un formulaire pour la confirmation de la suppression
                ?>
                <h2>Voulez-vous vraiment supprimer l'infrastructure suivante ?</h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom de l'infrastructure</th>
                      <th>Description</th>
                      <th>Type d'infrastructure</th>
                      <th>État</th>
                      <th>Capacité</th>
                      <th>Date de construction</th>
                      <th>Oasis</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $row['nom_infra']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td><?php echo $row['type_infra']; ?></td>
                      <td><?php echo $row['etat']; ?></td>
                      <td><?php echo $row['capacite']; ?></td>
                      <td><?php echo $row['date_construction']; ?></td>
                      <td><?php echo $row['id_oasis']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <form action="delete_confirm_infrastructures.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id_infra']; ?>">
                  <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                  <a href="infrastructures.php" class="btn btn-secondary">Annuler</a>
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

<!-- Footer Section -->
<?php require_once("partials/footer.php"); ?>
