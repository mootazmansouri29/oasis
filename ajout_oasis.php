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
                        $nom_oasis = $latitude = $longitude = $superficie = $population = $altitude = $acces_eau = $type_oasis = $id_ville = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $nom_oasis = htmlspecialchars($_POST['nom_oasis']);
                            $latitude = htmlspecialchars($_POST['latitude']);
                            $longitude = htmlspecialchars($_POST['longitude']);
                            $superficie = htmlspecialchars($_POST['superficie']);
                            $population = htmlspecialchars($_POST['population']);
                            $altitude = htmlspecialchars($_POST['altitude']);
                            $acces_eau = htmlspecialchars($_POST['acces_eau']);
                            $type_oasis = htmlspecialchars($_POST['type_oasis']);
                            $id_ville = htmlspecialchars($_POST['id_ville']);

                            $sql = "INSERT INTO Oasis (nom_oasis, latitude, longitude, superficie, population, altitude, acces_eau, type_oasis, id_ville) 
                            VALUES (:nom_oasis, :latitude, :longitude, :superficie, :population, :altitude, :acces_eau, :type_oasis, :id_ville)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':nom_oasis', $nom_oasis);
                            $stmt->bindParam(':latitude', $latitude);
                            $stmt->bindParam(':longitude', $longitude);
                            $stmt->bindParam(':superficie', $superficie);
                            $stmt->bindParam(':population', $population);
                            $stmt->bindParam(':altitude', $altitude);
                            $stmt->bindParam(':acces_eau', $acces_eau);
                            $stmt->bindParam(':type_oasis', $type_oasis);
                            $stmt->bindParam(':id_ville', $id_ville);
                            if ($stmt->execute()) {
                                header("Location: oasis.php");
                                exit();
                            } else {
                                echo "Erreur lors de l'ajout de l'oasis.";
                            }
                        }
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom de l'Oasis</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Superficie</th>
                                        <th>Population</th>
                                        <th>Altitude</th>
                                        <th>Accès à l'eau</th>
                                        <th>Type d'Oasis</th>
                                        <th>Ville</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" id="nom_oasis" name="nom_oasis" required></td>
                                        <td><input type="text" id="latitude" name="latitude" required></td>
                                        <td><input type="text" id="longitude" name="longitude" required></td>
                                        <td><input type="text" id="superficie" name="superficie" required></td>
                                        <td><input type="text" id="population" name="population" required></td>
                                        <td><input type="text" id="altitude" name="altitude" required></td>
                                        <td><input type="text" id="acces_eau" name="acces_eau" required></td>
                                        <td><input type="text" id="type_oasis" name="type_oasis" required></td>
                                        <td>
                                        <select id="id_ville" name="id_ville" required>
                                            <?php
                                            $query = "SELECT id_ville, nom_ville FROM Villes";
                                            $result = $pdo->query($query);
                                            if ($result->rowCount() > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='" . $row['id_ville'] . "'>" . $row['nom_ville'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value='' disabled selected>No cities found</option>";
                                            }
                                            ?>
                                        </select>
                                     </td>

                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="oasis.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>
