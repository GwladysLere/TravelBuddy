<?php
$title = "Connexion";
include "entete.php";
require_once("connexion_base.php");

if (isset($_SESSION['pseudo']))
	{
		echo "Bienvenue ".$_SESSION['pseudo'] ;
	}
?>
		
		<div class="page-header">
			<h1>Connexion à votre compte</h1>
		</div>
		
<?php
// exécuter une requete MySQL de type SELECT .. WHERE
$requete = "SELECT * FROM membre WHERE pseudo = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($_POST['pseudo']));

// récupérer tous les enregistrements dans un tableau
$enregistrements = $reponse->fetchAll();

// connaître le nombre d'enregistrements
$nombreReponses = count($enregistrements);

// tester si un enregistrement existe (on suppose qu'un même pseudo n'existe qu'une fois)
if ($nombreReponses > 0)
{
	if ($enregistrements[0]['motdepasse'] == MD5($_POST['motdepasse']))
	{
		echo "Bienvenue ".$_SESSION['pseudo'] ;
		$pseudo = $_POST['pseudo'] ;
		$_SESSION['pseudo'] = $pseudo ;
		$_SESSION['membre_id'] = $idmembre ;
	}
	else
	{
		echo "<p>Mot de passe incorrect</p>" ;
		echo '<p><a class="btn btn-primary btn-lg" href="connexion.php" role="button">Retour</a></p>' ;
	}
}
else
{
	echo "<p>Données de connexion incorrectes</p>" ;
	echo '<p><a class="btn btn-primary btn-lg" href="connexion.php" role="button">Retour</a></p>' ;
}
?>

<?php
include "pied.php";
?>