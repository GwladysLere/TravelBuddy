<?php
$title = "Trajets";
include "entete.php";
require_once("connexion_base.php");

//Si tous les champs du formulaire sont renseignés on récupère les données
if (empty($_POST['pays_souhaite']) /*or empty($_POST['ville_depart'])*/)
{
	echo "Beh alors ? on veut plus partir ? </br>";
	echo "<a href='trajet.php'> Retour </a>";
	include "pied.php";

	exit();
}	
else
{
	$pays_depart = $_POST['pays_souhaite'];
	/*$ville_depart = $_POST['ville_depart'];
	$pays_arrivee = $_POST['pays_arrivee'];
	$ville_arrivee = $_POST['ville_arrivee'];
	$date_depart = $_POST['date_depart'];
	$duree = $_POST['duree'];
	$nb_base = $_POST['nb_base'];
	$nb_participants = $_POST['nb_participants'];
	$description = $_POST['description'];
	$objectif1 = $_POST['objectif1'];
	$objectif2 = $_POST['objectif2'];
	$objectif3 = $_POST['objectif3'];
	if (!empty($_POST['objectif4'])) 
	{
		$objectif4 = $_POST['objectif4'];
	}
	else 
	{
		$objectif4 = "vide";
	}
	*/
}

/*$id_utilisateur = $_SESSION['membre_id'];*/

//On récupère les trajets de l'utilisateur
/*$requete = "SELECT * FROM trajet WHERE pays_depart = 'allemagne'";*/
$requete = "SELECT * FROM trajet WHERE pays_depart = ? ";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($pays_depart));

$enregistrements = $reponse->fetchAll();
$nombreReponses = count($enregistrements);
?>	

<h1> <?php echo $pays_depart ?> ? Très bon choix ! </h1>
<h3> Voyons ce que les Buddy ont proposé ... </h3> 
</br>


<?php
if ($nombreReponses<1){
 ?> 
 <h3> Et bien pour le moment... Il n'y a aucun trajet ! </h3>
 <h3> C'est l'occasion pour vous de créer un trajet ! Et de le partager avec des Buddy !</h3>
 </fieldset>
 <form action="creation_trajet.php" method="post">
					<div class="control-group">
					  <div class="controls">
						<input type="hidden" name="id_trajet" value="<?php echo $id_trajet; ?>" />
						<button class="btn btn-primary" id="bouton_modifier"> Créer votre propre trajet ! </button>
					  </div>
					</div>
</form>
<?php
}
else
{
echo "<section class='section_compte'>";
	for ($i=0; $i < $nombreReponses; $i++)
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
				
				
				<form action="exploration_trajet.php" method="post">
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

echo "</section>";
}
?>




<br/><a href="trajet.php"> Retour à la recherche </a>

<!-- Si on a le temps:
	- faire une page qui affiche les trajets de chaque utilisateur seulement, mes trajets donc comme un peu mon compte
-->

<?php
include "pied.php";
?>