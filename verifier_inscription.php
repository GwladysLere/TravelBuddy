<?php
$title = "Inscription";
include "entete.php";
require_once("connexion_base.php");

//Si tous les champs du formulaire sont renseignés on récupère les données
if (empty($_POST['pseudo']) or empty($_POST['motdepasse']) or empty($_POST['motdepasse2']) or empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['email'] or empty($_POST['telephone']) or empty($_POST['age']) or empty($_POST['sexe'])) )
{
	echo "Vous devez renseigner tous les champs </br>";
	echo "<a href='inscription.php'> Retour </a>";
	exit();
}	
else
{
	$pseudo = $_POST['pseudo'];
	$motdepasse = MD5($_POST['motdepasse']);
	$motdepasse2 = MD5($_POST['motdepasse2']);
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$age = $_POST['age'];
	$sexe = $_POST['sexe'];
}

//On vérifie que le mot de passe est le même dans mot de passe et confirmation
if ($motdepasse != $motdepasse2)
{
	echo"La confirmation du mot de passe n'est pas bonne. Tapez le même mot de passe dans le champ mot de passe et le champ confirmation <br/>";
	echo "<a href='inscription.php'> Retour </a>";
	exit();
}

//On vérifie que le pseudo soit libre et donc non présent dans la base de données
$requete = "SELECT * FROM utilisateur;";
$reponse = $pdo->prepare($requete);
$reponse->execute();
$enregistrements = $reponse->fetchAll();
$nombreReponses = count($enregistrements);
for ($i=0; $i<$nombreReponses; $i++)
{
	if ($enregistrements[$i]['pseudo'] == $pseudo)
	{
		echo "Pseudo déjà pris. Veuillez entrer un nouveau pseudo. <br/> <a href='inscription.php'> Retour </a> ";
		exit();
	}
}


//Chargement de la photo de profil et enregistrement dans un dossier
if(isset($_FILES['avatar'])) //s'il y a un fichier 
{
	// On vérifie que le fichier ne soit pas trop gros
	$taille_max = 512000;
	$taille = filesize($_FILES['avatar']['tmp_name']);
	if($taille > $taille_max) 
	{
		echo "Le fichier pour l'image de profil est trop gros. <br/> <a href='inscription.php'> Retour </a>";
		exit();
	}

	// On vérifie qu'il soit bien une image
	$extensions_valides = array('.jpeg', '.jpg', '.png', '.JPG', '.JPEG', '.PNG');
	$extension_fichier = strrchr($_FILES['avatar']['name'], '.');
	if (!in_array($extension_fichier, $extensions_valides)) 
	{
		echo "Extension du fichier incorrecte. Vous devez choisir un fichier en .jpeg, .jpg ou .png . <br/> <a href='inscription.php'> Retour </a>";
		exit();
	}

	// On vérifie qu'il n'y ait pas une autre erreur de transfert
	if($_FILES['avatar']['error'] > 0) 
	{
		echo "Erreur lors du transfert du fichier image de profil. <br/> <a href='inscription.php'> Retour </a>";
		exit();
	}

	// Puis si tout est bon on l'enregistre dans un dossier sous le nom pseudo.extension puisque le pseudo est unique dans la base de données et ne correspond donc qu'à une personne
	$dossier = 'image/avatars/';
	$avatar = $pseudo.$extension_fichier;
	$fichier = basename($avatar);
	if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier))
	{
		echo "Echec de l'upload <br/> <a href='inscription.php'> Retour </a>";
		exit();
	}
	
}
else
{
	echo "Vous devez donner une image de profil. <br/> <a href='inscription.php'> Retour </a>";
}

//On enregistre les données dans la base de données
$requete="INSERT INTO utilisateur (pseudo, nom, prenom, motdepasse, age, sexe, telephone, email, avatar) VALUES(?,?,?,?,?,?,?,?,?)";
$reponse=$pdo->prepare($requete);
$reponse->execute(array($pseudo, $nom, $prenom, $motdepasse, $age, $sexe, $telephone, $email, $avatar));


?>	

<h1> Bienvenue sur TravelBuddy! Nous espérons que vous trouverez chaussure à votre pied! </h1>

<!-- Renvoyer vers la page avec les données déjà remplies gardées?
	générer valeur au hasard pour le nm du fichier image avatar pour plus de sécurité-->

<?php
include "pied.php";
?>