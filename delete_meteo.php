<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white">
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des données météorologiques</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
            <?php
            require_once('connexion/connexion.php');

            // Vérifier si l'identifiant de la météo est passé en paramètre GET
            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              // Préparez votre requête SQL pour récupérer les détails de la météo
              $sql = "SELECT * FROM Meteo WHERE id_meteo = :id";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':id', $id);
              $stmt->execute();

              // Vérifiez s'il y a un résultat
              if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Affichez les détails de la météo dans un formulaire pour la confirmation de la suppression
                ?>
                <h2>Voulez-vous vraiment supprimer les données météorologiques suivantes ?</h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Température moyenne</th>
                      <th>Humidité relative</th>
                      <th>Pluviométrie</th>
                      <th>Vitesse du vent</th>
                      <th>Oasis</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $row['temperature_moyenne']; ?></td>
                      <td><?php echo $row['humidite_relative']; ?></td>
                      <td><?php echo $row['pluviometrie']; ?></td>
                      <td><?php echo $row['vitesse_vent']; ?></td>
                      <td><?php echo $row['id_oasis']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <form action="delete_confirm_meteo.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id_meteo']; ?>">
                  <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                  <a href="meteo.php" class="btn btn-secondary">Annuler</a>
                </form>
            <?php
              } else {
                echo "Aucune donnée météorologique trouvée avec cet identifiant.";
              }
            } else {
              echo "Identifiant de météo non spécifié.";
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
