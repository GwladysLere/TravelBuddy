<?php
$title = "Création de Trajet";
include "entete.php";
require_once("connexion_base.php");

//Si tous les champs du formulaire sont renseignés on récupère les données
if (empty($_POST['pays_depart']) or empty($_POST['ville_depart']) or empty($_POST['pays_arrivee']) or empty($_POST['ville_arrivee']) or empty($_POST['date_depart']) or empty($_POST['duree']) or empty($_POST['nb_base']) or empty($_POST['nb_participants']) or empty($_POST['description']) or empty($_POST['objectif1']) or empty($_POST['objectif2']) or empty($_POST['objectif3']) )
{
	echo "Tous les champs doivent être remplis. Seul le dernier objectif peut rester vide. </br>";
	echo "<a href='creation_trajet.php'> Retour </a>";
	include "pied.php";

	exit();
}	
else
{
	$pays_depart = $_POST['pays_depart'];
	$ville_depart = $_POST['ville_depart'];
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
	
}

$id_utilisateur = $_SESSION['membre_id'];

//On récupère les trajets de l'utilisateur
$requete = "SELECT * FROM trajet WHERE id_utilisateur = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_utilisateur));

$enregistrements = $reponse->fetchAll();
$nombreReponses = count($enregistrements);

if ($nombreReponses > 0)
{
	//On vérifie que l'utilisateur n'a pas de voyage déjà prévu à la date entrée
	if($date_depart == $enregistrements[0]['date_depart'])
	{
		echo "Vous avez déjà un voyage qui commence à cette date. Vous ne pouvez pas en commencer un autre au même moment. </br>";
		echo "<a href='creation_trajet.php'> Retour </a>";
		include "pied.php";

		exit();
	}
}

//On enregistre les données sur le trajet dans la table trajet de la base de donnée
$requete="INSERT INTO trajet (id_utilisateur, ville_depart, ville_arrivee, pays_depart, pays_arrivee, date_depart, duree, description, nb_base, nb_participants) VALUES(?,?,?,?,?,?,?,?,?,?)";
$reponse=$pdo->prepare($requete);
$reponse->execute(array($id_utilisateur, $ville_depart, $ville_arrivee, $pays_depart, $pays_arrivee, $date_depart, $duree, $description, $nb_base, $nb_participants));

//On récupère l'id du trajet qui vient d'être entré en BDD en utilisant l'id de l'utilisateur et la date de départ (l'utilisateur ne peut pas créer plusieurs voyages à une même date)  
$requete = "SELECT * FROM trajet WHERE id_utilisateur = ? AND date_depart = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($id_utilisateur, $date_depart));

$enregistrements = $reponse->fetchAll();

$id_trajet = $enregistrements[0]['id'];


//On enregistre les données sur les objectifs du voyage dans la table objectif de la base de données
if ($objectif4 != 'vide')
{
	$nb_obj = 3;
}
else
{
	$nb_obj = 2;
}

while ($nb_obj >=0 )
{
	//On prend les objectifs les uns après les autres dans $nom pour la requête, avec l'aide d'un tableau d'objectifs
	$objectifs = array('objectif1', 'objectif2', 'objectif3', 'objectif4');
	$nom = $$objectifs[$nb_obj];
	
	$requete="INSERT INTO objectif (id_trajet, nom ) VALUES(?,?)";
	$reponse=$pdo->prepare($requete);
	$reponse->execute(array($id_trajet, $nom));
	
	//on décrémente pour passer à l'objectif suivant
	$nb_obj = $nb_obj - 1;
}


?>	

<h1> Votre proposition de trajet a bien été enregistré!</h1> 
<br/><a href="compte.php"> Mon compte </a>

<!-- Si on a le temps:
	- faire une page qui affiche les trajets de chaque utilisateur seulement, mes trajets donc comme un peu mon compte
-->

<?php
include "pied.php";
?>