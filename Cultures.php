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
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des cultures</h1>
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
                                $sql = "SELECT COUNT(*) AS total FROM Cultures WHERE 
                                        nom_culture LIKE :search OR 
                                        description LIKE :search OR 
                                        periode_recolte LIKE :search OR 
                                        irrigation_utilisee LIKE :search";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                                $stmt->execute();
                            } else {
                                $sql = "SELECT COUNT(*) AS total FROM Cultures";
                                $stmt = $pdo->query($sql);
                            }

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total_pages = ceil($result['total'] / $limit);
                            $offset = ($page - 1) * $limit;
                            if (!empty($search)) {
                                $sql = "SELECT * FROM Cultures WHERE 
                                        nom_culture LIKE :search OR 
                                        description LIKE :search OR 
                                        periode_recolte LIKE :search OR 
                                        irrigation_utilisee LIKE :search
                                        LIMIT :limit OFFSET :offset";
                            } else {
                                $sql = "SELECT * FROM Cultures LIMIT :limit OFFSET :offset";
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
                                        Ajouter une Cultures
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
                                        <th>Id_Culture</th>
                                        <th>Nom_Culture</th>
                                        <th>Description</th>
                                        <th>Rendement_Moyen</th>
                                        <th>Période_Récolte</th>
                                        <th>Irrigation_Utilisée</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Récupération des résultats
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>".$row["id_culture"]."</td>"; 
                                        echo "<td>".$row["nom_culture"]."</td>"; 
                                        echo "<td>".$row["description"]."</td>"; 
                                        echo "<td>".$row["rendement_moyen"]."</td>"; 
                                        echo "<td>".$row["periode_recolte"]."</td>"; 
                                        echo "<td>".$row["irrigation_utilisee"]."</td>"; 
                                        echo "<td>"; 
                                        echo "<a href='edit_culture.php?id=".$row['id_culture']."' class='btn btn-outline-primary btn-sm me-1'><i class='bi bi-pencil'></i></a>"; // Lien pour éditer une culture
                                        echo "<a href='delete_culture.php?id=".$row['id_culture']."' class='btn btn-outline-danger btn-sm me-1'><i class='bi bi-trash'></i></a>"; // Lien pour supprimer une culture
                                        echo "<a href='afficher_culture.php?id=".$row['id_culture']."' class='btn btn-outline-success btn-sm me-1'><i class='bi bi-eye'></i></a>"; // Lien pour afficher les détails d'une culture
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
                <h5 class="modal-title">Cultures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <?php
                $nom_culture = $description = $rendement_moyen = $periode_recolte = $irrigation_utilisee = $id_oasis = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nom_culture = htmlspecialchars($_POST['nom_culture']);
                    $description = htmlspecialchars($_POST['description']);
                    $rendement_moyen = htmlspecialchars($_POST['rendement_moyen']);
                    $periode_recolte = htmlspecialchars($_POST['periode_recolte']);
                    $irrigation_utilisee = htmlspecialchars($_POST['irrigation_utilisee']);
                    $id_oasis = htmlspecialchars($_POST['id_oasis']);
                
                    // Database connection assumed to be established and stored in $pdo variable
                
                    try {
                        $sql = "INSERT INTO Cultures (nom_culture, description, rendement_moyen, periode_recolte, irrigation_utilisee, id_oasis) 
                                VALUES (:nom_culture, :description, :rendement_moyen, :periode_recolte, :irrigation_utilisee, :id_oasis)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':nom_culture', $nom_culture);
                        $stmt->bindParam(':description', $description);
                        $stmt->bindParam(':rendement_moyen', $rendement_moyen);
                        $stmt->bindParam(':periode_recolte', $periode_recolte);
                        $stmt->bindParam(':irrigation_utilisee', $irrigation_utilisee);
                        $stmt->bindParam(':id_oasis', $id_oasis);
                        if ($stmt->execute()) {
                            header("Location: cultures.php");
                            exit();
                        } else {
                            echo "Erreur lors de l'ajout de la culture.";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                }                
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="nom_culture">Nom de la Culture</label>
                        <input type="text" class="form-control" id="nom_culture" name="nom_culture" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rendement_moyen">Rendement Moyen</label>
                        <input type="number" class="form-control" id="rendement_moyen" name="rendement_moyen" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="periode_recolte">Période de Récolte</label>
                        <input type="text" class="form-control" id="periode_recolte" name="periode_recolte" required>
                    </div>
                    <div class="form-group">
                        <label for="irrigation_utilisee">Irrigation Utilisée</label>
                        <input type="text" class="form-control" id="irrigation_utilisee" name="irrigation_utilisee" required>
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
