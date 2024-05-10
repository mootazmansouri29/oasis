<?php
    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("location: login.php");
        exit();
    }
?>
<?php require_once("partials/navbar.php");?>
<style>
    .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
}
    </style>

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
                            $limit = 2;
                            $search = "";
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                $search = $_GET['search'];
                            }
                            if (!empty($search)) {
                                $sql = "SELECT COUNT(*) AS total FROM Oasis WHERE 
                                        nom_oasis LIKE :search OR 
                                        id_ville IN (SELECT id_ville FROM Villes WHERE nom_ville LIKE :search)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                                $stmt->execute();
                            } else {
                                $sql = "SELECT COUNT(*) AS total FROM Oasis";
                                $stmt = $pdo->query($sql);
                            }

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total_pages = ceil($result['total'] / $limit);
                            $offset = ($page - 1) * $limit;
                            if (!empty($search)) {
                                $sql = "SELECT * FROM Oasis WHERE 
                                        nom_oasis LIKE :search OR 
                                        id_ville IN (SELECT id_ville FROM Villes WHERE nom_ville LIKE :search)
                                        LIMIT :limit OFFSET :offset";
                            } else {
                                $sql = "SELECT * FROM Oasis LIMIT :limit OFFSET :offset";
                            }

                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                            if (!empty($search)) {
                                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                            }
                            $stmt->execute();
                            ?>
                             <div class="row mb-3">
                                <div class="col-12 col-md-6 mb-2">
                                <button id="addOasisBtn" class="btn btn-success">
                                        <i class="bi bi-plus"></i>
                                        Ajouter une oasis
                                    </button>
                                </div>
                                <div class="col-12 col-md-6">
                                    <form class="d-flex" action="" method="GET">
                                        <input class="form-control me-2" name="search" type="search" placeholder="Recherche..." aria-label="Search" value="<?php if (isset($search)) { echo htmlentities($search); } ?>">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id_Oasis</th> 
                                        <th>Nom_Oasis</th> 
                                        <th>Latitude</th> 
                                        <th>Longitude</th> 
                                        <th>Superficie</th> 
                                        <th>Population</th> 
                                        <th>Altitude</th> 
                                        <th>Acces_eau</th> 
                                        <th>Type_Oasis</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Récupération des résultats
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>".$row["id_oasis"]."</td>"; 
                                        echo "<td>".$row["nom_oasis"]."</td>"; 
                                        echo "<td>".$row["latitude"]."</td>"; 
                                        echo "<td>".$row["longitude"]."</td>"; 
                                        echo "<td>".$row["superficie"]."</td>"; 
                                        echo "<td>".$row["population"]."</td>"; 
                                        echo "<td>".$row["altitude"]."</td>"; 
                                        echo "<td>".$row["acces_eau"]."</td>"; 
                                        echo "<td>".$row["type_oasis"]."</td>"; 
                                        echo "<td>"; 
                                        echo "<a href='edit_oasis.php?id=".$row['id_oasis']."' class='btn btn-outline-primary btn-sm me-1'><i class='bi bi-pencil'></i></a>"; // Lien pour éditer une oasis
                                        echo "<a href='delete_oasis.php?id=".$row['id_oasis']."' class='btn btn-outline-danger btn-sm me-1'><i class='bi bi-trash'></i></a>"; // Lien pour supprimer une oasis
                                        echo "<a href='afficher_oasis.php?id=".$row['id_oasis']."' class='btn btn-outline-success btn-sm me-1'><i class='bi bi-eye'></i></a>"; // Lien pour afficher les détails d'une oasis
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center"> 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?search=<?php echo $search; ?>&page=<?php echo ($page - 1); ?>">&laquo; Précédent</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if ($page == $i) echo 'active'; ?>"><a class="page-link" href="?search=<?php echo $search; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($page < $total_pages): ?>
                <li class="page-item"><a class="page-link" href="?search=<?php echo $search; ?>&page=<?php echo ($page + 1); ?>">Suivant &raquo;</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="showBtnModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Oasis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <?php
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
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom_oasis">Nom de l'Oasis</label>
                                <input type="text" class="form-control" id="nom_oasis" name="nom_oasis" required>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" required>
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" required>
                            </div>
                            <div class="form-group">
                                <label for="superficie">Superficie</label>
                                <input type="text" class="form-control" id="superficie" name="superficie" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="population">Population</label>
                                <input type="text" class="form-control" id="population" name="population" required>
                            </div>
                            <div class="form-group">
                                <label for="altitude">Altitude</label>
                                <input type="text" class="form-control" id="altitude" name="altitude" required>
                            </div>
                            <div class="form-group">
                                <label for="acces_eau">Accès à l'eau</label>
                                <input type="text" class="form-control" id="acces_eau" name="acces_eau" required>
                            </div>
                            <div class="form-group">
                                <label for="type_oasis">Type d'Oasis</label>
                                <input type="text" class="form-control" id="type_oasis" name="type_oasis" required>
                            </div>
                            <div class="form-group">
                                <label for="id_ville">Ville</label>
                                <select class="form-control" id="id_ville" name="id_ville" required>
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
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Ajouter</button>
                    <a href="oasis.php" class="btn btn-secondary">Annuler</a>
                    </form>
                     </div>
                    </div>
                    </div>
                    </div>
                 </div>
                </div>
                </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("addOasisBtn").addEventListener("click", function() {
        $('#showBtnModal').modal('show');
    });
</script>

<?php require_once("partials/footer.php");?>
