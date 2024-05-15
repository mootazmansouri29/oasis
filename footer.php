
<footer class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-top: 30%;">
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
              <img src="Les_Excursions.jpg" class="img-fluid mb-3" alt="Image de remplacement">
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
              <img src="Découvrir_Tozeur.jpg" class="img-fluid mb-3" alt="Image de remplacement">
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
              <img src="Venir_Tozeur.jpeg" class="img-fluid mb-3" alt="Image de remplacement">
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