

<?php include(__DIR__."/../template/header.php"); ?>

<?php include(__DIR__."/../template/navbar.php"); ?>


    <div class="jumbotron text-center">
      <div class="container">
         <?php 
           if (!(isset($_SESSION['name']))) 
            { 
              echo '
              <h1>Benvenuto in Smartimmo</h1>
              <div class="container welcome-container text-center">
                <p>Sei alla ricerca di un piccolo gestionale per la tua attività immobiliare, che sia comodo, veloce ed allo stesso tempo affidabile?  
                Su SmartImmo trovi tutto il minimo indispensabile per gestire al meglio la tua attività e pubblicare annunci completi di foto, descrizione e possiblità di essere contattati!
                </p>
              </div>'
              ; 
            }
            else 
            {
               echo '<h1> <span class="welcome-name">'. $_SESSION['name'] . '</span></h1>
                     <h3 class="mt-3">Ecco i tuoi annunci.</h3>'; 
            }
          ?>
      </div>
    </div>

        <?php 
          if (isset($_SESSION['name'])) { 
            echo '
            <div class="container">
              <div class="row">';
                 foreach ($previewAnnouncements as $preview) {
                     echo '
                    <div class="col-md-4">
                        <h2>'. $preview['Tipologia'] .'</h2>
                        <img src="'. $preview['Immagine'].'" style="height:200px; width:100%;" />
                        <p><a class="btn btn-default"  href="/dettaglio/'.$preview['id'].'">Dettagli &raquo;</a></p>
                    </div>';
                  }
              echo ' 
              </div>  
            </div>'; 
                         
          }else{
            echo  '
            <div class="container  text-center">
             <div class="row ">
                <div class="col-md-12 mt-3 mb-3">
                    <h3>Elenco Annunci Pubblicati</h3>
                 </div>
             </div>
              <div class="row mt-3">';
               foreach ($announcements as $singleAnnouncements) {
                 echo '
                    <div class="col-md-4">
                        <h2>'. $singleAnnouncements['Tipologia'] .'</h2>
                        <img src="'. $singleAnnouncements['Immagine'].'" style="height:200px;width:100%;" />
                        <a class="btn btn-default" id="public-detail-button" href="/dettaglio/'.$singleAnnouncements['idAnnuncio'].'-'.  strtolower($singleAnnouncements['Tipologia']).'-'. strtolower($singleAnnouncements['Categoria']).'/'.$singleAnnouncements['idAgenzia'].'">Dettagli &raquo;</a>
                    </div>';
                  }
              echo ' 
              </div>
            </div>';  
          }
        ?>
      <hr>


    
      <footer>
        <p>&copy; 2018 SmartImmo</p>
      </footer>
    </div>


<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler effetturare il logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
         <a id="submitFormLogout" class="btn btn-danger" style="color: #fff;">Logout</a> 
      </div>
    </div>
  </div>
</div>


<?php include(__DIR__."/../template/footer.php"); ?>
