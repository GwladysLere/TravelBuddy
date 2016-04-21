<?php
$title = "Mes trajets";
include "entete.php";

require_once("connexion_base.php");


$membre_id = $_SESSION['membre_id'];

//On récupère les trajets de l'utilisateur et toutes les données dessus
$requete = "SELECT * FROM trajet WHERE id_utilisateur = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($membre_id));

$enregistrements = $reponse->fetchAll();
$nbReponses = count($enregistrements);

if ($nbReponses == 0)
{
	echo "Vous n'avez enregistré aucun trajet.";
	include "pied.php";
	exit();
}
else
{
	echo "<h1> Mes trajets </h1>";
	echo "<section class='section_compte'>";
	for ($i=0; $i < $nbReponses; $i++)
	{
		
		$ville_depart = $enregistrements[$i]['ville_depart'];
		$ville_arrivee = $enregistrements[$i]['ville_arrivee'];
		$pays_depart = $enregistrements[$i]['pays_depart'];
		$pays_arrivee = $enregistrements[$i]['pays_arrivee'];
		$date_depart = date("d/m/y", strtotime($enregistrements[$i]['date_depart']));
		$duree = $enregistrements[$i]['duree'];
		$id_trajet = $enregistrements[$i]['id'];
		
		?>
		
			<fieldset>
				<legend> <?php echo $pays_depart." vers ".$pays_arrivee; ?> </legend>
					<div>
						<?php echo $ville_depart." vers ".$ville_arrivee; ?> 
					</div>
					
					<div>
						<?php echo "Départ le ".$date_depart." pour ".$duree; ?> 
					</div>
				
				
				<form action="details_trajet.php" method="post">
					<div class="control-group">
					  <div class="controls">
						<input type="hidden" name="id_trajet" value="<?php echo $id_trajet; ?>" />
						<button class="btn btn-primary" id="bouton_modifier">Voir détails</button>
					  </div>
					</div>
				</form>
				
			</fieldset>
<?php		
	}
}
echo "</section>";

?>





<?php
include "pied.php";
?>