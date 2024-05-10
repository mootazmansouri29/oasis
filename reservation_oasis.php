<?php
    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
   <head>     
      <meta charset="utf-8">
      <title>Oasis</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
      <link rel="stylesheet" href="css/os.css">
      <link href="css/styles.css" rel="stylesheet" />
   </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="Acceuil.php"> 🏝️Oasis de Tozeur </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="Acceuil.php">Acceuil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Sahara_Tunisienne.php">Sahara Tunisienne</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Tourisme.php">Tourisme</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="About.php">A propos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="reservation_oasis.php">Réservation</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
            Pages
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="villes.php">Villes</a>
            <a class="dropdown-item" href="Oasis.php">Oasis</a>
            <a class="dropdown-item" href="Cultures.php">Cultures</a>
            <a class="dropdown-item" href="Produits.php">Produits</a>
            <a class="dropdown-item" href="Infrastructure.php">Infrastructure</a>
            <a class="dropdown-item" href="Ressources_eau.php">Ressources en eau</a>
            <a class="dropdown-item" href="Meteo.php">Météo</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="login.php"><i class="fas fa-door-open"></i> Déconnexion</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Réserver une Oasis🏝️</h2>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <form action="process_reservation.php" method="POST" id="reservationForm">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom_client" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email_client" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone_client" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date de réservation:</label>
                        <input type="date" class="form-control" id="date" name="date_reservation" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="heure">Heure de réservation:</label>
                        <input type="time" class="form-control" id="heure" name="heure_reservation" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre de personnes:</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_personnes" required onchange="calculatePrice()">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix:</label>
                        <input type="text" class="form-control" id="prix" name="prix" readonly>
                    </div>
                    <div class="form-group">
                        <label for="commentaire">Commentaire:</label>
                        <textarea class="form-control" id="commentaire" name="commentaire"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-success btn-block">Réserver</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container mt-5">
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Offres pour les oasis en Tunisie</h2>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
            <img src="images/desert.png" alt="desert" class="mx-auto d-block" style="width: 100px; height: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Oasis de Tozeur</h5>
                    <p class="card-text">Découvrez l'authenticité de l'oasis de Tozeur avec ses palmeraies et ses traditions séculaires.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
            <img src="images/chameaux.png" alt="chameaux" class="mx-auto d-block" style="width: 100px; height: 100px;">
            <div class="card-body">
            <h5 class="card-title">Oasis de Chebika</h5>
            <p class="card-text">Plongez dans les eaux rafraîchissantes de l'oasis de Chebika et explorez ses cascades naturelles.</p>
        </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
            <img src="images/quad.png" alt="quad" class="mx-auto d-block" style="width: 100px; height: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Oasis de Douz</h5>
                    <p class="card-text">Admirez le paysage unique de l'oasis de Douz, où le désert rencontre les palmeraies.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<footer class="navbar navbar-expand-lg navbar-dark bg-dark mt-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tous droits réservés à &copy; 2016 apcpedagogie.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Politique de confidentialité</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">À propos de nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contactez-nous</a>
        </li>
      </ul>
    </div>
  </div>
</footer>
<script>
    function calculatePrice() {
        var numberOfPeople = document.getElementById('nombre').value;
        var basePrice = 550; 

        if (numberOfPeople > 1) {
            var additionalPrice = (numberOfPeople - 1) * 550;
            basePrice += additionalPrice;
        }
        document.getElementById('prix').value = basePrice;
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
</html>