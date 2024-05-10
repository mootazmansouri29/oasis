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
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des données météorologiques</h1>
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
                                $sql = "SELECT COUNT(*) AS total FROM Meteo WHERE 
                                        temperature_moyenne LIKE :search OR 
                                        humidite_relative LIKE :search OR 
                                        pluviometrie LIKE :search OR 
                                        vitesse_vent LIKE :search";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                                $stmt->execute();
                            } else {
                                $sql = "SELECT COUNT(*) AS total FROM Meteo";
                                $stmt = $pdo->query($sql);
                            }

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total_pages = ceil($result['total'] / $limit);
                            $offset = ($page - 1) * $limit;
                            if (!empty($search)) {
                                $sql = "SELECT * FROM Meteo WHERE 
                                        temperature_moyenne LIKE :search OR 
                                        humidite_relative LIKE :search OR 
                                        pluviometrie LIKE :search OR 
                                        vitesse_vent LIKE :search
                                        LIMIT :limit OFFSET :offset";
                            } else {
                                $sql = "SELECT * FROM Meteo LIMIT :limit OFFSET :offset";
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
                                        Ajouter des données météorologiques
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
                                        <th>Id_Meteo</th>
                                        <th>Température_Moyenne</th>
                                        <th>Humidité_Relative</th>
                                        <th>Pluviométrie</th>
                                        <th>Vitesse_Vent</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Récupération des résultats
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>".$row["id_meteo"]."</td>"; 
                                        echo "<td>".$row["temperature_moyenne"]."</td>"; 
                                        echo "<td>".$row["humidite_relative"]."</td>"; 
                                        echo "<td>".$row["pluviometrie"]."</td>"; 
                                        echo "<td>".$row["vitesse_vent"]."</td>"; 
                                        echo "<td>"; 
                                        echo "<a href='edit_meteo.php?id=".$row['id_meteo']."' class='btn btn-outline-primary btn-sm me-1'><i class='bi bi-pencil'></i></a>"; // Lien pour éditer des données météorologiques
                                        echo "<a href='delete_meteo.php?id=".$row['id_meteo']."' class='btn btn-outline-danger btn-sm me-1'><i class='bi bi-trash'></i></a>"; // Lien pour supprimer des données météorologiques
                                        echo "<a href='afficher_meteo.php?id=".$row['id_meteo']."' class='btn btn-outline-success btn-sm me-1'><i class='bi bi-eye'></i></a>"; // Lien pour afficher les détails des données météorologiques
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

<!-- Pagination -->
<div class="d-flex justify-content-center"> 
    <nav aria-label="Page navigation example">
        <ul class="pagination ">
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
                <h5 class="modal-title">Conditions Météorologiques</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <?php
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
                        echo "Erreur lors de l'ajout des conditions météorologiques.";
                    }
                }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="temperature_moyenne">Température Moyenne (°C)</label>
                        <input type="number" class="form-control" id="temperature_moyenne" name="temperature_moyenne" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="humidite_relative">Humidité Relative (%)</label>
                        <input type="number" class="form-control" id="humidite_relative" name="humidite_relative" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="pluviometrie">Pluviométrie (mm)</label>
                        <input type="number" class="form-control" id="pluviometrie" name="pluviometrie" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="vitesse_vent">Vitesse du Vent (m/s)</label>
                        <input type="number" class="form-control" id="vitesse_vent" name="vitesse_vent" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="id_oasis">ID de l'Oasis</label>
                        <input type="number" class="form-control" id="id_oasis" name="id_oasis" required>
                    </div>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
