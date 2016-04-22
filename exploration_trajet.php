<?php
$title = "Trajets";
include "entete.php";

require_once("connexion_base.php");

$membre_id = $_SESSION['membre_id'];
$id_trajet = $_POST['id_trajet'];
$id_utilisateur = $_POST['id_utilisateur'];
//On récupère les données du trajet voulu de l'utilisateur
$requete = "SELECT * FROM trajet";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_trajet));

$enregistrements = $reponse->fetchAll();
	
$ville_depart = $enregistrements[0]['ville_depart'];
$ville_arrivee = $enregistrements[0]['ville_arrivee'];
$pays_depart = $enregistrements[0]['pays_depart'];
$pays_arrivee = $enregistrements[0]['pays_arrivee'];
$date_depart = date("d/m/y", strtotime($enregistrements[0]['date_depart']));
$duree = $enregistrements[0]['duree'];
$description = $enregistrements[0]['description'];
$nb_base = $enregistrements[0]['nb_base'];
$nb_participants = $enregistrements[0]['nb_participants'];

//On récupère les objectifs du trajet
$requete = "SELECT * FROM objectif WHERE id_trajet = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_trajet));

$enregistrements = $reponse->fetchAll();

// On compte le nombre d'objectifs pour ce trajet
$nbReponses = count($enregistrements);


?>
<form action="trajet.php" method="post">
					<div class="control-group">
					  <div class="controls">
						<input type="hidden" name="id_trajet" value="<?php echo $id_trajet; ?>" />
						<button class="btn btn-primary" id="bouton_modifier"> Retour à la recherche </button>
					  </div>
					</div>
</form>

<h1> <?php echo $pays_depart." vers ".$pays_arrivee; ?> </h1>

<section class="section_compte">
	<fieldset>
		<legend> Organisateur </legend>
			
		<div>
			<?php echo "<b>Buddy : </b>".$id_utilisateur; ?> 
		</div>
		<p> c'est ici qu'il faudrait mettre un lien vers l'utilisateur </p>
		
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

	

