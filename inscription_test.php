<?php
$title = "Inscription";
include "entete.php";
?>	

		
		<form class="form-horizontal" action="verifier_connexion.php" method="post">
			<fieldset>

				<!-- Form Name -->
				<legend>Inscription</legend>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="textinput-0">Pseudo</label>
				  <div class="controls">
					<input name="textinput-0" class="input-xlarge" id="textinput-0" type="text" placeholder="pseudo">
				  </div>
				</div>

				<!-- Password input-->
				<div class="control-group">
				  <label class="control-label" for="passwordinput-0">Mot de passe</label>
				  <div class="controls">
					<input name="passwordinput-0" class="input-xlarge" id="passwordinput-0" type="password" placeholder="mot de passe">
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="textinput-1">Nom</label>
				  <div class="controls">
					<input name="textinput-1" class="input-xlarge" id="textinput-1" type="text" placeholder="Ducros">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="textinput-2">Prénom</label>
				  <div class="controls">
					<input name="textinput-2" class="input-xlarge" id="textinput-2" type="text" placeholder="pMartine">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="textinput-3">Âge</label>
				  <div class="controls">
					<input name="textinput-3" class="input-xlarge" id="textinput-3" type="text" placeholder="43">
					
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="textinput-3">Âge</label>
				  <div class="controls">
					<input type="number" name="age" >
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="textinput-5">Text Input</label>
				  <div class="controls">
					<input name="textinput-5" class="input-xlarge" id="textinput-5" type="text" placeholder="placeholder">
					<p class="help-block">help</p>
				  </div>
				</div>

				<!-- Multiple Radios -->
				<div class="control-group">
				  <label class="control-label" for="multipleradios-0">Multiple Radios</label>
				  <div class="controls">
					<label class="radio" for="multipleradios-0-0">
					  <input name="multipleradios-0" id="multipleradios-0-0" type="radio" checked="checked" value="Option one">
					  Option one
					</label>
					<label class="radio" for="multipleradios-0-1">
					  <input name="multipleradios-0" id="multipleradios-0-1" type="radio" value="Option two">
					  Option two
					</label>
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="textinput-4">Text Input</label>
				  <div class="controls">
					<input name="textinput-4" class="input-xlarge" id="textinput-4" type="text" placeholder="placeholder">
					<p class="help-block">help</p>
				  </div>
				</div>

				<!-- Button -->
				<div class="control-group">
				  <label class="control-label" for="singlebutton-0">Single Button</label>
				  <div class="controls">
					<button name="singlebutton-0" class="btn btn-primary" id="singlebutton-0">Button</button>
				  </div>
				</div>

			</fieldset>
		</form>
<?php
include "pied.php";
?>