<?php
$title = "Inscription";
include "entete.php";
?>	

		<h1> Inscription </h1>
		<form action="verifier_connexion.php" method="post" class="form_inscription">
			
			<fieldset>
				<legend> Informations de connexion </legend>
				<div>
					<label for="pseudo"> Pseudo </label>
					<input type="text" name="pseudo" />
				</div>
				<div>
					<label for="motdepasse"> Mot de passe </label>
					<input type="password" name="pseudo" />
				</div>
			</fieldset>
			
			<fieldset>
				<legend> Coordonnées </legend>
				<div>
					<label for="nom"> Nom </label>
					<input type="text" name="nom" />
				</div>
				<div>
					<label for="prenom"> Prénom </label>
					<input type="text" name="prenom" />
				</div>
				<div>
					<label for="email"> Adresse mail </label>
					<input type="email" name="email" />
				</div>
				<div>
					<label for="telephone"> Téléphone </label>
					<input type="tel" name="telephone" />
				</div>
			</fieldset>
			
			<fieldset>
				<legend> Caractéristiques </legend>
				<div>
					<label for="age"> Âge </label>
					<input type="number" name="age" />
				</div>
				<div>
					<label for="date"> Date de naissance </label>
					<input type="date" name="date" />
				</div>
				<div>
					<label for="sexe"> Sexe </label>
					<input type="radio" name="sexe" value="homme" /> homme
					<input type="radio" name="sexe" value="femme" /> femme
				</div>
					
			</fieldset>

				

			</fieldset>
		</form>
<?php
include "pied.php";
?>