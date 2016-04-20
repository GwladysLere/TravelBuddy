<?php
$title = "Connexion";
include "entete.php";
require_once("connexion_base.php");



//On vérifie que les champs sont remplis
if (empty($_POST['pseudo']) or empty($_POST['motdepasse']) )
{
	echo "Vous devez renseigner tous les champs </br>";
	echo "<a href='connexion.php'> Retour </a>";
	include "pied.php";
	exit();
}	
else
{
	$pseudo = $_POST['pseudo'];
	$motdepasse = MD5($_POST['motdepasse']);
}

// On vérifie si le mot de passe correspond et on remplie une variable de session

// exécuter une requete MySQL de type SELECT .. WHERE
$requete = "SELECT * FROM utilisateur WHERE pseudo = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($pseudo));

// récupérer tous les enregistrements dans un tableau
$enregistrements = $reponse->fetchAll();

// connaître le nombre d'enregistrements
$nombreReponses = count($enregistrements);

// tester si un enregistrement existe (un même pseudo n'existe qu'une fois)
if ($nombreReponses > 0)
{
	if ($enregistrements[0]['motdepasse'] == $motdepasse)
	{
		$_SESSION['pseudo'] = $pseudo ;
		$_SESSION['membre_id'] = $enregistrements[0]['id'] ;
		echo "<h1>Bienvenue ".$_SESSION['pseudo']."</h1>" ;
	}
	else
	{
		echo "<p>Mot de passe incorrect</p>" ;
		echo "<a href='connexion.php'> Retour </a>" ;
	}
}
else
{
	echo "<p>Données de connexion incorrectes</p>" ;
	echo "<a href='connexion.php'> Retour </a>";
}


/* si le temps:
	-ajouter la page mon compte en dessous du bienvenue */
?>

<?php
include "pied.php";
?>