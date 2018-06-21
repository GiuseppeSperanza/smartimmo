<?php include(__DIR__."/../template/header.php"); ?>

<?php include(__DIR__."/../template/bar-return.php"); ?>
      


<div class="container mt-5 text-center">
	<div class="row">
		<div class="col-md-12">
			<h1>Inserisci il tuo annuncio <i class="fas fa-table"></i></h1>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data" id="form-new-announcement">
		<div class="row">
          	<div class="col-md-6 mb-3">
            	<label for="newCategory">Categoria</label>
          		<select class="custom-select" id="newCategory" name="category" required>
          			<option selected disabled>---</option>
                  	<option value="Residenziale">Residenziale</option> 
                  	<option value="Commerciale">Commerciale</option> 
                </select>
          	</div>
		
          
          	<div class="col-md-6 mb-3">
            	<label for="typologyInput">Tipologia</label>
                <select class="custom-select" id="typologyInput" name="typology" required>
                	  <option selected disabled>---</option>
                      <option value="Appartamento">Appartamento</option> 
                      <option value="Ufficio">Ufficio</option> 
                      <option value="Villa">Villa</option> 
                 </select>
          	</div>
        </div>

        <div class="row">
          	<div class="col-md-6 mb-3">
            	<label for="contractInput">Contratto</label>
          		<select class="custom-select" id="contractInput" name="contract" required>
          			<option selected disabled>---</option>
                	<option value="Vendita">Vendita</option> 
                	<option value="Affitto">Affitto</option> 
            	</select>
          	</div>

          	<div class="col-md-6 mb-3">
            	<label for="priceInput">Prezzo</label>
                <input type="number" class="form-control" id="priceInput" placeholder="Prezzo" name="price" required>
          	</div>
        </div>
		
		<div class="row mb-3">
          	<div class="col-md-4 mb-3">
            	<label for="surfaceInput">Superficie</label>
                <input type="number" class="form-control" id="surfaceInput" placeholder="Superficie" name="surface" required>
          	</div>

          	<div class="col-md-4 mb-3">
            	<label for="comuneInput">Comune</label>
                <input type="text" class="form-control" id="comuneInput" placeholder="Comune" name="comune" required>
          	</div>

          	<div class="col-md-4 mb-3">
            	<label for="localsInput">Numero Locali</label>
               	<input type="number" class="form-control" id="localsInput" placeholder="Numero Locali" name="locals" required>
          	</div>
        </div>

        <div class="row">
        	<div class="col-md-12">
        		<div class="input-group mb-3">
				  	<div class="custom-file">
				    	<input type="file" class="custom-file-input" id="inputImg" name="inputImg">
				    	<label class="custom-file-label" for="inputImg"></label>
					 </div>
				</div>
			<label style="position: relative; top: -15px;" for="inputImg" generated="true" class="error"></label>
			</div>
        </div>
		
		<div class="col-md-12 mt-3 text-center">
    		<p id="error1" style="display:none; color:#FF0000; position: relative; top: -25px;">
				Formato immagine non valido! I formati ammissibili sono: JPG | JPEG | PNG | GIF
			</p>
			<p id="error2" style="display:none; color:#FF0000; position: relative; top: -25px;">
				Superato il limite massimo di grandezza!
			</p>
    	</div>
	
		
		<div class="row mt-5">
			<div class="col-md-4 offset-md-2">
				<input type="submit" class="btn btn-primary btn-block" name="new-announcement" id="new-announcement" value="Invia"></input>
			</div>
			<div class="col-md-4">
				<button type="button" class="btn btn-danger reset btn-block">Cancella</button>
			</div>
		</div>	
		
    </form>
              
</div><!--End container 
			-->





<?php include(__DIR__."/../template/footer.php"); ?>

<script>

</script>