<?php include(__DIR__."/../template/header.php"); ?>

<?php include(__DIR__."/../template/bar-return.php"); ?>


    
    <?php 
    if (isset($_SESSION['name'])) { 
      foreach ($detailAnnouncements as $detail) { ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <h2 class="tipologia detail"><?=$detail['Tipologia']?>, <?=$detail['Comune']?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 details">
           <ul class="ul-detail">
             <li class="category">
                <?=$detail['Categoria']?>
              </li>
              <li class="contract">
                <?=$detail['Contratto']?>
              </li>
              <li class="price">
                <i class="fas fa-euro-sign"></i> <?=number_format($detail['Prezzo'] , 0, ',', '.');?>
              </li>
              <li>
                <i class="fas fa-home"></i> <?=$detail['NumeroLocali']?> <span>locali</span>
              </li>
              <li>
                <?=$detail['Superficie']?> m<sup>2</sup> <span>superficie</span>
              </li>
           </ul>
          </div>
          <div class="col-md-5 text-center d-none d-lg-block">
            <h2>Modifica Annuncio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <img src="<?=$detail['Immagine']?>" alt="" class="img-fluid img-thumbnail">
          </div>
          <div class="col-md-5 text-center mt-3 form-contact-detail">

              <form method="POST">

                <div class="form-group">
                  <select class="custom-select" id="categoryInput" name="category" required>
                    <option selected disabled>Categoria</option>
                      <option value="Residenziale">Residenziale</option> 
                      <option value="Commerciale">Commerciale</option> 
                  </select>
                </div>

               <div class="form-group">
                  <select class="custom-select" id="typologyInput" name="typology" required>
                    <option selected disabled>Tipologia</option>
                      <option value="Appartamento">Appartamento</option> 
                      <option value="Ufficio">Ufficio</option> 
                      <option value="Villa">Villa</option> 
                  </select>
                </div>

                <div class="form-group">
                  <select class="custom-select" id="contractInput" name="contract" required>
                      <option selected disabled>Contratto</option>
                        <option value="Vendita">Vendita</option> 
                        <option value="Affitto">Affitto</option> 
                  </select>
                </div>


                <div class="form-group">
                  <input type="number" class="form-control" id="priceInput" placeholder="Prezzo" name="price" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="comuneInput" placeholder="Comune" name="comune" required>
                </div>

                <div class="form-group">
                  <input type="number" class="form-control" id="surfaceInput" placeholder="Superficie" name="surface" required>
                </div>

                <div class="form-group">
                  <input type="number" class="form-control" id="localsInput" placeholder="Numero Locali" name="locals" required>
                </div>

                <input type="hidden" name="idAnnouncement" value="<?=$idAnnouncement?>">

                <button type="submit" class="btn btn-primary" name="update-form">Invia Modifiche</button>

                <button type="button" class="btn btn-danger" data-toggle='modal' data-target='#deleteModal'>Cancella Annuncio</button>
              
              </form>

              <form method="POST" id="delete-form" name="delete-form" style='display: none;'>
                <input type="hidden" name="deleteIdAnnouncement" value="<?=$idAnnouncement?>">
              </form>

          </div>
        </div>
      </div>

    <?php
    }
  }
    ?>



     <?php 
    if (!(isset($_SESSION['name']))) { 
      foreach ($detailPublicAnnouncements as $detail) { ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <h2 class="tipologia detail"><?=$detail['Tipologia']?>, <?=$detail['Comune']?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 details">
           <ul class="ul-detail">
             <li class="category">
                <?=$detail['Categoria']?>
              </li>
              <li class="contract">
                <?=$detail['Contratto']?>
              </li>
              <li class="price">
                <i class="fas fa-euro-sign"></i> <?=number_format($detail['Prezzo'] , 0, ',', '.');?>
              </li>
              <li>
                <i class="fas fa-home"></i> <?=$detail['NumeroLocali']?> <span>locali</span>
              </li>
              <li>
                <?=$detail['Superficie']?> m<sup>2</sup> <span>superficie</span>
              </li>
           </ul>
          </div>
          <div class="col-md-5 text-center d-none d-lg-block">
            <h2>Contatta l'inserzionista</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <img src="<?=$detail['Immagine']?>" alt="" class="img-fluid img-thumbnail">
          </div>
          <div class="col-md-5 text-center mt-3 form-contact-detail">

              <form method="POST">

                <div class="form-group">
                    <label for="inputName" class="sr-only">Nome</label>
                    <input type="text" id="inputName" class="form-control" placeholder="Il tuo nome" required autofocus name="name">
                </div>

               <div class="form-group">
                    <label for="inputLastName" class="sr-only">Cognome</label>
                    <input type="text" id="inputLastName" class="form-control" placeholder="Il tuo cognome" required autofocus name="lastname">
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email</label>
                  <input type="text" id="inputEmail" class="form-control" placeholder="Indirizzo email" required autofocus name="email">
                </div>


                <div class="form-group">
                  <label for="telNo" class="sr-only">Numero di telefono</label>
                  <input id="telNo" type="tel" class="form-control" placeholder="Inserisci il tuo numero di cellulare" name="telNumber">
                </div>

                <div class="form-group">
                  <textarea class="form-control" rows="3" id="comment" placeholder="Inserisci il tuo messaggio" name="note"></textarea>
                </div>
                
                <div class="checkbox mb-3">
                  <label class="info-privacy">
                    <input type="checkbox" name="privacy"> <span>Ho letto e accetto le Condizioni Generali e Informativa della Privacy</span>
                  </label>
                </div>


                <button type="submit" class="btn btn-primary" name="contact-form">Contatta</button>

                <button type="button" class="btn btn-danger reset">Cancella Informazioni</button>
              
              </form>

              <span class="msg-error">
                <?php 
                  if (isset($publicController::$messageError)) {
                    echo $publicController::$messageError;
                  } ?>
                    
                </span>


          </div>
        </div>
      </div>

    <?php
    }
  }
    ?>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare l'annuncio?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
         <a id="deleteAnnouncement" class="btn btn-danger" style="color: #fff;">Elimina</a> 
      </div>
    </div>
  </div>
</div>

<?php include(__DIR__."/../template/footer.php");?>