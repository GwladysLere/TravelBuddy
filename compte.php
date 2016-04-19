<?php
$title = "Mon compte";
include "entete.php";

require_once("connexion_base.php");

$pseudo = $_SESSION['pseudo'];
$membre_id = $_SESSION['membre_id'];

//On récupère les données de l'utilisateur
$requete = "SELECT * FROM utilisateur WHERE pseudo = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($pseudo));

$enregistrements = $reponse->fetchAll();

$avatar = $enregistrements[0]['avatar'];
$nom = $enregistrements[0]['nom'];
$prenom = $enregistrements[0]['prenom'];
$email = $enregistrements[0]['email'];
$telephone = $enregistrements[0]['telephone'];
$age = $enregistrements[0]['age'];
$sexe = $enregistrements[0]['sexe'];
?>

<h1> Mon compte </h1>

<section class="section_compte">
	<fieldset>
		<legend> Informations de connexion </legend>
			<table>
				<tr>
					<td><?php echo "<img src='image/avatars/".$avatar."' alt='photo de profil' width='160' height='160' >"; ?> </td>
				</tr>
			</table>
			<table>
				<tr>
					<td><b>Pseudo :</b></td> 
					<td> <?php echo $_SESSION['pseudo']; ?> </td>
				</tr>
			</table>
		
			<table>
				<tr>
					<td><b>Mot de passe :</b></td> 
					<td> ******** </td>
				</tr>
			</table>
		
		<div class="control-group">
		  <div class="controls">
			<a href="modifier_infos_connexion.php"><button class="btn btn-primary" id="bouton_modifier">Modifier</button></a>
		  </div>
		</div>
		
	</fieldset>
	
	<fieldset>
		<legend> Coordonnées </legend>
			<table>
				<tr>
					<td><b>Nom :</b></td>
					<td><?php echo $nom; ?> </td>
				</tr>
			</table>
			<table>
				<tr>
					<td><b>Prénom :</b></td> 
					<td> <?php echo $prenom; ?> </td>
				</tr>
			</table>
		
			<table>
				<tr>
					<td><b>Adresse mail :</b></td> 
					<td> <?php echo $email; ?> </td>
				</tr>
			</table>
			
			<table>
				<tr>
					<td><b>téléphone :</b></td> 
					<td> <?php echo $telephone; ?> </td>
				</tr>
			</table>
			
		<div class="control-group">
		  <div class="controls">
			<a href="modifier_coordonnees.php"><button class="btn btn-primary" id="bouton_modifier">Modifier</button></a>
		  </div>
		</div>
	</fieldset>
	
	<fieldset>
		<legend> Caractéristiques </legend>
			<table>
				<tr>
					<td><b>Age :</b></td> 
					<td> <?php echo $age; ?> </td>
				</tr>
			</table>
			
			<table>
				<tr>
					<td><b>Sexe :</b></td> 
					<td> <?php echo $sexe; ?> </td>
				</tr>
			</table>
		
		<div class="control-group">
		  <div class="controls">
			<a href="modifier_caracteristiques.php"><button class="btn btn-primary" id="bouton_modifier">Modifier</button></a>
		  </div>
		</div>
	
	</fieldset>
</section>
	




<?php
include "pied.php";
?>