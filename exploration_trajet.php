<?php
$title = "Trajets";
include "entete.php";

require_once("connexion_base.php");



$id_trajet = $_POST['id_trajet'];

//On récupère les données du trajet voulu de l'utilisateur

$requete = "SELECT * FROM trajet, utilisateur WHERE trajet.id= ? and trajet.id_utilisateur=utilisateur.id ";

$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_trajet));
$enregistrements = $reponse->fetchAll();
$id_utilisateur = $enregistrements[0]['pseudo'];


$avatar = $enregistrements[0]['avatar'];
$email = $enregistrements[0]['email'];
$telephone = $enregistrements[0]['telephone'];
	
$ville_depart = $enregistrements[0]['ville_depart'];
$ville_arrivee = $enregistrements[0]['ville_arrivee'];
$pays_depart = $enregistrements[0]['pays_depart'];
$pays_arrivee = $enregistrements[0]['pays_arrivee'];
$date_depart = date("d/m/y", strtotime($enregistrements[0]['date_depart']));
$duree = $enregistrements[0]['duree'];

$nb_base = $enregistrements[0]['nb_base'];
$nb_participants = $enregistrements[0]['nb_participants'];

//On récupère la description du trajet

$requete = "SELECT * FROM trajet WHERE id = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_trajet));
$enregistrements = $reponse->fetchAll();
$description = $enregistrements[0]['description'];

//On récupère les objectifs du trajet
$requete = "SELECT * FROM objectif WHERE id_trajet = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_trajet));

$enregistrements = $reponse->fetchAll();
// On compte le nombre d'objectifs pour ce trajet
$nbReponses = count($enregistrements);


?>

<div class="control-group">
  <div class="controls">
	<a href="trajet.php"><button class="btn btn-primary" id="bouton_modifier"> Retour à la recherche </button></a>
  </div>
</div>

<h1> <?php echo $pays_depart." vers ".$pays_arrivee; ?> </h1>

<section class="section_compte">
	<fieldset>
		<legend> Organisateur </legend>
		<div>
			<div>
				<?php echo "<img src='image/avatars/".$avatar."' alt='photo de profil' width='160' height='160' />"; ?> 
			</div>
				<?php echo "<b>Buddy : </b>".$id_utilisateur; ?>
		</div>		
		<div>
			<?php
			if (empty($_SESSION['membre_id']) or $_SESSION['membre_id'] == 0)
			{
				echo "<b>Il faut se connecter pour avoir accès à plus d'informations.</b>";
				echo "<a href='connexion.php'> Se connecter ou s'inscrire </a>";
	 
			}
			else
			{
				echo "</br> <b> email : </b><a href='mailto:".$email."'>".$email."</a>";
				echo "</br> <b> téléphone : </b>".$telephone;
			}			
			
			?> 
		</div>
		
	</fieldset>
	
	<fieldset>
		<legend> Trajet </legend>
			
		<div>
			<?php echo "<b>Départ : </b>".$ville_depart." en ".$pays_depart; ?> 
		</div>
		
		
		<div>
			<?php echo "<b>Arrivée : </b>".$ville_arrivee." en ".$pays_arrivee; ?>
		</div>
		
		<div>	
			<?php echo "<b>Départ le </b>".$date_depart."<b> pour </b>".$duree; ?>
		</div>	
		
		
	</fieldset>
	
	<fieldset>
		<legend> Caractéristiques </legend>
		
		<div>	
			<?php echo "<b>Description: </b>".$description; ?>
		</div>		
		
		<div>	
			<?php echo "<b>Nombre de personnes organisant : </b>".$nb_base; ?>
		</div>	
		
		<div>	
			<?php echo "<b>Nombre de participants souhaités : </b>".$nb_participants; ?>
		</div>	
		
		<div>	
			<?php echo "<b>Objectifs : </b>";
			for ($i=0; $i < $nbReponses - 1; $i++)
			{
				echo $enregistrements[$i]['nom'].", "; 
			} 
			echo $enregistrements[$i]['nom'];
			?>
		</div>	
			
	
	</fieldset>
</section>

<?php
include "pied.php";
?>

	

