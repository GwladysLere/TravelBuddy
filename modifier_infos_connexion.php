<?php
$title = "Modification";
include "entete.php";

require_once("connexion_base.php");

?>

<h1> Modification des informations de connexion </h1>
	<form action="verifier_modification.php" method="post" class="form_inscription" enctype="multipart/form-data">
		
		<fieldset>
			<legend> Informations de connexion </legend>
			<div>
				<label for="pseudo"> Pseudo </label>
				<input type="text" name="pseudo" placeholder="pseudo" />
			</div>
			
			<div>
				<label for="ancien_motdepasse"> Ancien mot de passe </label>
				<input type="password" name="ancien_motdepasse" placeholder="mot de passe"/>
			</div>
			
			<div>
				<label for="motdepasse"> Nouveau mot de passe </label>
				<input type="password" name="motdepasse" placeholder="mot de passe"/>
			</div>
			
			<div>
				<label for="motdepasse2"> Confirmation </label>
				<input type="password" name="motdepasse2" placeholder="mot de passe"/>
			</div>
			<div>
				<label for="avatar"> Image de profil (Taille max 500 Ko) </label>
				<input type="hidden" name="taille_max" value="512000" />
				<input type="file" name="avatar" id="avatar"/>
			</div>
			
			<input type="hidden" name="modif" value="modifier_infos_connexion.php" />
			
		</fieldset>
		
		<div class="control-group">
		  <div class="controls">
			<button class="btn btn-primary" id="bouton_inscription">Valider</button>
		  </div>
		</div>
		
	</form>


<?php
include "pied.php";
?>