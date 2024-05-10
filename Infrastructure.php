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
                    <h1 data-aos="fade-up" class="mb-4 display-4 fw-bold text-center text-success" style="font-family: 'Courgette', cursive;">Liste des infrastructures</h1>
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
                                $sql = "SELECT COUNT(*) AS total FROM Infrastructure WHERE 
                                        nom_infra LIKE :search OR 
                                        description LIKE :search OR 
                                        type_infra LIKE :search OR 
                                        etat LIKE :search";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                                $stmt->execute();
                            } else {
                                $sql = "SELECT COUNT(*) AS total FROM Infrastructure";
                                $stmt = $pdo->query($sql);
                            }

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total_pages = ceil($result['total'] / $limit);
                            $offset = ($page - 1) * $limit;
                            if (!empty($search)) {
                                $sql = "SELECT * FROM Infrastructure WHERE 
                                        nom_infra LIKE :search OR 
                                        description LIKE :search OR 
                                        type_infra LIKE :search OR 
                                        etat LIKE :search
                                        LIMIT :limit OFFSET :offset";
                            } else {
                                $sql = "SELECT * FROM Infrastructure LIMIT :limit OFFSET :offset";
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
                                        Ajouter une Infrastructure
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
                                        <th>Id_Infrastructure</th>
                                        <th>Nom_Infrastructure</th>
                                        <th>Description</th>
                                        <th>Type_Infrastructure</th>
                                        <th>Etat</th>
                                        <th>Capacité</th>
                                        <th>Date_Construction</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Récupération des résultats
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>".$row["id_infra"]."</td>"; 
                                        echo "<td>".$row["nom_infra"]."</td>"; 
                                        echo "<td>".$row["description"]."</td>"; 
                                        echo "<td>".$row["type_infra"]."</td>"; 
                                        echo "<td>".$row["etat"]."</td>"; 
                                        echo "<td>".$row["capacite"]."</td>"; 
                                        echo "<td>".$row["date_construction"]."</td>"; 
                                        echo "<td>"; 
                                        echo "<a href='edit_infrastructure.php?id=".$row['id_infra']."' class='btn btn-outline-primary btn-sm me-1'><i class='bi bi-pencil'></i></a>"; // Lien pour éditer une infrastructure
                                        echo "<a href='delete_infrastructure.php?id=".$row['id_infra']."' class='btn btn-outline-danger btn-sm me-1'><i class='bi bi-trash'></i></a>"; // Lien pour supprimer une infrastructure
                                        echo "<a href='afficher_infrastructure.php?id=".$row['id_infra']."' class='btn btn-outline-success btn-sm me-1'><i class='bi bi-eye'></i></a>"; // Lien pour afficher les détails d'une infrastructure
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
                <h5 class="modal-title">Infrastructures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <?php
                $nom_infra = $description = $type_infra = $etat = $capacite = $date_construction = $id_oasis = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nom_infra = htmlspecialchars($_POST['nom_infra']);
                    $description = htmlspecialchars($_POST['description']);
                    $type_infra = htmlspecialchars($_POST['type_infra']);
                    $etat = htmlspecialchars($_POST['etat']);
                    $capacite = htmlspecialchars($_POST['capacite']);
                    $date_construction = htmlspecialchars($_POST['date_construction']);
                    $id_oasis = htmlspecialchars($_POST['id_oasis']);

                    $sql = "INSERT INTO Infrastructure (nom_infra, description, type_infra, etat, capacite, date_construction, id_oasis) 
                            VALUES (:nom_infra, :description, :type_infra, :etat, :capacite, :date_construction, :id_oasis)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':nom_infra', $nom_infra);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':type_infra', $type_infra);
                    $stmt->bindParam(':etat', $etat);
                    $stmt->bindParam(':capacite', $capacite);
                    $stmt->bindParam(':date_construction', $date_construction);
                    $stmt->bindParam(':id_oasis', $id_oasis);
                    if ($stmt->execute()) {
                        header("Location: infrastructures.php");
                        exit();
                    } else {
                        echo "Erreur lors de l'ajout de l'infrastructure.";
                    }
                }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="nom_infra">Nom de l'Infrastructure</label>
                        <input type="text" class="form-control" id="nom_infra" name="nom_infra" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="type_infra">Type d'Infrastructure</label>
                        <input type="text" class="form-control" id="type_infra" name="type_infra" required>
                    </div>
                    <div class="form-group">
                        <label for="etat">État</label>
                        <input type="text" class="form-control" id="etat" name="etat" required>
                    </div>
                    <div class="form-group">
                        <label for="capacite">Capacité</label>
                        <input type="number" class="form-control" id="capacite" name="capacite" required>
                    </div>
                    <div class="form-group">
                        <label for="date_construction">Date de Construction</label>
                        <input type="date" class="form-control" id="date_construction" name="date_construction" required>
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
