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
                // Affichez les détails de l'oasis dans un formulaire pour la confirmation de la suppression
                ?>
                <h2>Voulez-vous vraiment supprimer l'oasis suivant ?</h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom de l'oasis</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Superficie</th>
                      <th>Population</th>
                      <th>Altitude</th>
                      <th>Accès à l'eau</th>
                      <th>Type d'oasis</th>
                      <th>Ville</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $row['nom_oasis']; ?></td>
                      <td><?php echo $row['latitude']; ?></td>
                      <td><?php echo $row['longitude']; ?></td>
                      <td><?php echo $row['superficie']; ?></td>
                      <td><?php echo $row['population']; ?></td>
                      <td><?php echo $row['altitude']; ?></td>
                      <td><?php echo $row['acces_eau']; ?></td>
                      <td><?php echo $row['type_oasis']; ?></td>
                      <td><?php echo $row['id_ville']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <form action="delete_confirm_oasis.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id_oasis']; ?>">
                  <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                  <a href="oasis.php" class="btn btn-secondary">Annuler</a>
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

<!-- Footer Section -->
<?php require_once("partials/footer.php"); ?>
