<?php
$title = "Mon Compte";
include "entete.php";
?>

<h1> Mon compte </h1>
		<form action="verifier_connexion.php" method="post" class="form_inscription" id="form_connexion">
			
			<fieldset>
				<legend> Connexion </legend>
				<div>
					<label for="pseudo"> Pseudo </label>
					<input type="text" name="pseudo" placeholder="pseudo" />
				</div>
				
				<div>
					<label for="motdepasse"> Mot de passe </label>
					<input type="password" name="motdepasse" placeholder="mot de passe"/>
				</div>
				
			</fieldset>
			
			<div class="control-group">
				<label class="control-label" for="connexion"></label>
				<div class="controls">
					<button id="connexion" name="connexion" class="btn btn-primary">Connexion</button>
				</div>
			</div>
			
			<div class="bouton_sinscrire">
				<p>Vous n'avez pas encore de compte ?</p>
				<a href="inscription.php"><button type="button" class="btn btn-success">S'inscrire</button></a>
			</div>
		</form>




<?php
include "pied.php";
?>