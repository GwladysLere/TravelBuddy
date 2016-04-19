<?php
$title = "Modification";
include "entete.php";

require_once("connexion_base.php");

?>

<h1> Modification des coordonnées </h1>
	<form action="verifier_modification.php" method="post" class="form_inscription">
		
		<fieldset>
			<legend> Coordonnées </legend>
			<div>
				<label for="nom"> Nom </label>
				<input type="text" name="nom" placeholder="nom" />
			</div>
			
			<div>
				<label for="prenom"> Prénom </label>
				<input type="text" name="prenom" placeholder="prénom" />
			</div>
			
			<div>
				<label for="email"> Adresse mail </label>
				<input type="email" name="email" placeholder="nom.prenom@gmail.com"/>
			</div>
			
			<div>
				<label for="telephone"> Téléphone </label>
				<input type="tel" name="telephone" placeholder="0559567897"/>
			</div>
			
			<input type="hidden" name="modif" value="modifier_coordonnees.php" />
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