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
$description = $enregistrements[0]['description'];
?>

<h1> Mon compte </h1>

<section class="section_compte">
	<fieldset>
		<legend> Informations de connexion </legend>
			<div>
				<?php echo "<img src='image/avatars/".$avatar."' alt='photo de profil' width='160' height='160' >"; ?> 
			</div>
			
			<div>
				<b>Pseudo :</b>
				<?php echo $_SESSION['pseudo']; ?> 
			</div>
		
			<div>
				<b>Mot de passe : </b>  ********
			</div>
		
		<div class="control-group">
		  <div class="controls">
			<a href="modifier_infos_connexion.php"><button class="btn btn-primary" id="bouton_modifier">Modifier</button></a>
		  </div>
		</div>
		
	</fieldset>
	
	<fieldset>
		<legend> Coordonnées </legend>
			<div>
				<b>Nom :</b>
				<?php echo $nom; ?> 
			</div>
			
			<div>
				<b>Prénom :</b> 
				<?php echo $prenom; ?>
			</div>
		
			<div>
				<b>Adresse mail :</b> 
				<?php echo "<a href='mailto:".$email."'>".$email."</a>"; ?> 
			</div>	
			
			<div>
				<b>téléphone :</b> 
				<?php echo $telephone; ?>
			</div>	
			
		<div class="control-group">
		  <div class="controls">
			<a href="modifier_coordonnees.php"><button class="btn btn-primary" id="bouton_modifier">Modifier</button></a>
		  </div>
		</div>
	</fieldset>
	
	<fieldset>
		<legend> Caractéristiques </legend>
		
		<div>	
			<b>Age :</b>
			<?php echo $age; ?>
		</div>		
			
			
		<div>		
			<b>Sexe :</b></td> 
			<?php echo $sexe; ?> </td>
		</div>
		
		<div>	
			<b>Description :</b>
			 <?php echo $description; ?> 
		</div>
		
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