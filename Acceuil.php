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

<div class="container" style="margin:20px;">
  <div class="row">
    <div class="col-sm">
      <img src="images/Tozeur.jpg"   width="800" height=""class="img" alt="...">
    </div>

    <div class="col-sm">
      <div class="card-body">
        <h3 class="card-title text-success">La Vieille oasis 
          <br>de Tozeur </h3>
        <p class="card-text">La municipalité de Tozeur a entrepris <br>depuis une semaine des opérations de <br>nettoyage
          et de curage des cours d'eau<br> situés dans l'oasis de Tozeur et<br> considérées
           d'une importance vitale pour<br> l'oasis et la ville. Selon Wassila Hedri,<br> premier adjoint du maire de la ville,
            cette <br>opération de réhabilitation a pour but de <br>redonner vie aux cours d'eau et <br>de restaurer le lit de la rivière</p>
        <a href="video.php" class="btn btn-success">Lire plus.</a>
      </div>
    </div>
</div>   
</div>

<div class="container" style="background-color:#f5f5f5;border:1px solid #f5f5f5;margin:30px auto;text-align:center;">
  <div class="row">
    <div class="col-md text-center">
      <p>Selon Yassine Brani, universitaire et spécialiste de l'ancienne oasis, cette situation catastrophique dure depuis la moitié des années 80 avec le tarissement des sources d'eaux naturelles à cause de l'assèchement des nappes phréatiques d'une part, et l'installation d'unités hôtelières à proximité des sources d'eaux.</p>
    </div>
  </div>
</div>

<div class="container" style="margin-bottom: 20px;">
  <div class="card-group equal-height">
    <div class="card">
      <div class="card-body shadow-lg p-3 bg-Success rounded custom-card">
        <h5 class="card-title text-success">Les Excursions :</h5>
        <p class="card-text">Découvrez les excursions de l'agence de voyages Autre Tunisie au départ de grandes villes comme Tunis ou Tozeur. Chaque balade vous fera découvrir un aspect caractéristiques de la ville concernée ou de sa région.Les monuments et l'architecture d'une ville varient en fonction de son histoire et de ses flux de peuplements . Nous vous proposons de découvrir les richesses de la Tunisie en notre compagnie. Vous souhaitez découvrir une ville qui n'est pas à notre catalogue ? N'hésitez pas à nous contacter via notre formulaire de contact.</p>
        <button type="button" class="btn btn-success" onclick="openMiniWindow()">Plus d'information .</button>
      </div>
    </div>

    <div class="card">
      <div class="card-body shadow-lg p-3 bg-Success rounded custom-card">
        <h5 class="card-title text-success">Découvrir la ville de Tozeur: </h5>
        <p class="card-text">Tozeur est une ville située au sud-ouest de la Tunisie, non loin de la frontière algérienne. C'est la belle capitale de la région d'EL-DJérid, elle est connue pour ses mythiques marabouts. A l'époque, Tozeur se nommait Thusorus, un passage entre Biskra et Gabès. La ville de Tozeur était déjà une ville habitée dans l'antiquité. C'est l'ancienne ville de Thusorus. Elle a connu une véritable expansion économique durant le moyen âge grâce au commerce caravaniers.<br> De cette époque subsiste les souks de la médina aver leurs incroyable tapisseries.</p>
        <button type="button" class="btn btn-success" onclick="openMiniWindow2()">Plus d'information .</button>
      </div>
    </div>

    <div class="card">
      <div class="card-body shadow-lg p-3 bg-Success rounded custom-card">
        <h5 class="card-title text-success">Venir et se déplacer à Tozeur : </h5>
        <p class="card-text">Venir à Tozeur est une chose facile. Il existe des vols directs Paris-Tozeur. Elle est à seulement 2h 45 de vol depuis Paris avec des tarifs aux alentours de 250 euros. Vous atterrirez dans l'aéroport de Tozeur à une petite dizaine de minutes de la ville. On prend un taxi pour rejoindre votre hotel. Avec un peu de chance, vous trouverez également des vols directs au départ des grandes villes de province les reliant à Tozeur.<br> Il est par exemple possible de prendre l'avion àNice, à Marseille, à Lyon, à Toulouse, à Nantes ou encore à Bruxelles.</p>
        <button type="button" class="btn btn-success" onclick="openMiniWindow3()">Plus d'information .</button>
      </div>
    </div>
  </div>
</div>


<footer class="navbar navbar-expand-lg navbar-dark bg-dark">
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
  function openMiniWindow(modalNumber) {
    var modalHtml = `
      <div class="modal fade" id="miniWindow${modalNumber}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center">
                
              </div>
              <img src="images/Les_Excursions.jpg" class="img-fluid mb-3" alt="Image de remplacement">
              <p>Balade à dos de chameau à Tozeur refers to camel rides in the town of Tozeur in Tunisia. Tozeur is known for its beautiful desert landscapes and camel rides offer visitors a unique way to experience the area.</p>
            </div>            
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>`;
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    $(`#miniWindow${modalNumber}`).modal('show');
    $(`#miniWindow${modalNumber}`).on('hidden.bs.modal', function (e) {
      $(this).remove();
    });
  }
  function openMiniWindow2() {
    var modalHtml = `
      <div class="modal fade" id="miniWindow2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center">
       
              </div>
              <img src="images/Découvrir_Tozeur.jpg" class="img-fluid mb-3" alt="Image de remplacement">
              <p>Explorez l'histoire de Tozeur, ancienne cité nommée Thusorus, au cœur du sud-ouest tunisien. Profitez de ses souks animés, imprégnez-vous de son ambiance unique et découvrez ses marabouts légendaires, symboles de son passé riche en commerce caravanier.</p>
            </div>            
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>`;
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    $('#miniWindow2').modal('show');
    $('#miniWindow2').on('hidden.bs.modal', function (e) {
      $(this).remove();
    });
  }

  function openMiniWindow3() {
    var modalHtml = `
      <div class="modal fade" id="miniWindow2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center">
        
              </div>
              <img src="images/Venir_Tozeur.jpeg" class="img-fluid mb-3" alt="Image de remplacement">
              <p>Tatooine est une planète-désert de l’univers de fiction Star Wars. Située dans la Bordure extérieure, cette planète orbite autour des étoiles binaires Tatoo I et II. Il s'agit du monde d'origine de la famille Skywalker. Malgré la chaleur torride qui règne à sa surface.  </p>
            </div>            
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>`;
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    $('#miniWindow2').modal('show');
    $('#miniWindow2').on('hidden.bs.modal', function (e) {
      $(this).remove();
    });
  }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
</html>