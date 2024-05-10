<?php require_once("partials/navbar.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="card-fluid">
                <div class="card-body">
                    <div class="custom-container bg-black text-white"> 
                        <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Ajouter des Données Météorologiques</h1>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <?php
                            require_once('connexion/connexion.php');
                            $temperature_moyenne = $humidite_relative = $pluviometrie = $vitesse_vent = $id_oasis = "";
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $temperature_moyenne = htmlspecialchars($_POST['temperature_moyenne']);
                                $humidite_relative = htmlspecialchars($_POST['humidite_relative']);
                                $pluviometrie = htmlspecialchars($_POST['pluviometrie']);
                                $vitesse_vent = htmlspecialchars($_POST['vitesse_vent']);
                                $id_oasis = htmlspecialchars($_POST['id_oasis']);

                                $sql = "INSERT INTO Meteo (temperature_moyenne, humidite_relative, pluviometrie, vitesse_vent, id_oasis) 
                                        VALUES (:temperature_moyenne, :humidite_relative, :pluviometrie, :vitesse_vent, :id_oasis)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':temperature_moyenne', $temperature_moyenne);
                                $stmt->bindParam(':humidite_relative', $humidite_relative);
                                $stmt->bindParam(':pluviometrie', $pluviometrie);
                                $stmt->bindParam(':vitesse_vent', $vitesse_vent);
                                $stmt->bindParam(':id_oasis', $id_oasis);
                                if ($stmt->execute()) {
                                    header("Location: meteo.php");
                                    exit();
                                } else {
                                    echo "Erreur lors de l'ajout des données météorologiques.";
                                }
                            }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Température Moyenne</td>
                                            <td><input type="number" step="0.01" id="temperature_moyenne" name="temperature_moyenne" required></td>
                                        </tr>
                                        <tr>
                                            <td>Humidité Relative</td>
                                            <td><input type="number" step="0.01" id="humidite_relative" name="humidite_relative" required></td>
                                        </tr>
                                        <tr>
                                            <td>Pluviométrie</td>
                                            <td><input type="number" step="0.01" id="pluviometrie" name="pluviometrie" required></td>
                                        </tr>
                                        <tr>
                                            <td>Vitesse du Vent</td>
                                            <td><input type="number" step="0.01" id="vitesse_vent" name="vitesse_vent" required></td>
                                        </tr>
                                        <tr>
                                            <td>ID Oasis</td>
                                            <td><input type="number" id="id_oasis" name="id_oasis" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="Meteo.php" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
