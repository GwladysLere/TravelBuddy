<?php
$title = "Modification";
include "entete.php";
require_once("connexion_base.php");

$pseudo = $_SESSION['pseudo'];

// cette variable permet de savoir quel est le formulaire qui fait appel à verifier_modification.php
$traitement = 0;

// On vérifie si tous les champs d'un formulaire sont remplis pour trouver de quel formulaire il s'agit.
//S'il n'y a pas de ligne avec tous les champs remplis, c'est que l'utilisateur n'a pas rempli tous les champs de son formulaire
if (!empty($_POST['pseudo']) and !empty($_POST['ancien_motdepasse']) and !empty($_POST['motdepasse']) and !empty($_POST['motdepasse2']) and !empty($_FILES['avatar']))
{
	$traitement = 1;
	
}
elseif (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['telephone']))
{
	$traitement = 2;
	
}
elseif (!empty($_POST['age']) and !empty($_POST['sexe']) and !empty($_POST['description']))
{
	$traitement = 3;
	
}

if ($traitement == 0)
{
	echo $_POST['pseudo']."mdp1".$_POST['ancien_motdepasse']."mdp2".$_POST['motdepasse']."mdp3".$_POST['motdepasse2'].$_FILES['avatar'];
	echo "Vous devez remplir tous les champs";
	echo "<a href='".$_POST['modif']."'> Retour </a>";
	include "pied.php";
	exit();
}

//On récupère les informations de base de l' utilisateur, avant modification
$requete = "SELECT * FROM utilisateur WHERE pseudo = ?";
$reponse = $pdo->prepare($requete);
$reponse->execute(array($pseudo));
$enregistrements = $reponse->fetchAll();


if ($traitement == 1)
//Il s' agit donc du formulaire pour changer les informations de connexion
{
	$pseudo = $_POST['pseudo'];
	$ancien_motdepasse = MD5($_POST['ancien_motdepasse']);
	$motdepasse = MD5($_POST['motdepasse']);
	$motdepasse2 = MD5($_POST['motdepasse2']);
	
	//On vérifie la validité de l'ancien mot de passe
	if ($ancien_motdepasse != $enregistrements[0]['motdepasse'])
	{
		echo"L'ancien mot de passe ne correspond pas. <br/>";
		echo "<a href='modifier_infos_connexion.php'> Retour </a>";
		include "pied.php";
		exit();
	}
	
	//On vérifie que la confirmation de mot de passe correspond bien au mot de passe tapé
	if ($motdepasse != $motdepasse2)
	{
		echo"La confirmation du mot de passe n'est pas bonne. Tapez le même mot de passe dans le champ mot de passe et le champ confirmation <br/>";
		echo "<a href='modifier_infos_connexion.php'> Retour </a>";
		include "pied.php";
		exit();
	}
	
	//Chargement de la nouvelle photo de profil et enregistrement dans un dossier
	if(isset($_FILES['avatar'])) //s'il y a un fichier 
	{
		// On vérifie que le fichier ne soit pas trop gros
		$taille_max = 512000;
		$taille = filesize($_FILES['avatar']['tmp_name']);
		if($taille > $taille_max) 
		{
			echo "Le fichier pour l'image de profil est trop gros. <br/> <a href='inscription.php'> Retour </a>";
			include "pied.php";
			exit();
		}

		// On vérifie qu'il soit bien une image
		$extensions_valides = array('.jpeg', '.jpg', '.png', '.JPG', '.JPEG', '.PNG');
		$extension_fichier = strrchr($_FILES['avatar']['name'], '.');
		if (!in_array($extension_fichier, $extensions_valides)) 
		{
			echo "Extension du fichier incorrecte. Vous devez choisir un fichier en .jpeg, .jpg ou .png . <br/> <a href='inscription.php'> Retour </a>";
			include "pied.php";
			exit();
		}

		// On vérifie qu'il n'y ait pas une autre erreur de transfert
		if($_FILES['avatar']['error'] > 0) 
		{
			echo "Erreur lors du transfert du fichier image de profil. <br/> <a href='inscription.php'> Retour </a>";
			include "pied.php";
			exit();
		}
		
		// on supprime la photo existante
		$ancien_nom = $enregistrements[0]['avatar'];
		unlink("image/avatars/".$ancien_nom);
		
		// Puis si tout est bon on enregistre la nouvelle image dans le dossier
		$dossier = 'image/avatars/';
		$avatar = $pseudo.$extension_fichier;
		$fichier = basename($avatar);
		if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier))
		{
			echo "Echec de l'upload <br/> <a href='inscription.php'> Retour </a>";
			include "pied.php";
			exit();
		}
	
	}
	else
	{
		echo "Vous devez donner une image de profil. <br/> <a href='modifier_infos_connexion.php'> Retour </a>";
	}
	//On entre les nouvelles données dans la base
	$requete="UPDATE utilisateur SET pseudo=?, motdepasse=?, avatar=? WHERE pseudo=?";
	$reponse=$pdo->prepare($requete);
	$reponse->execute(array($pseudo, $motdepasse, $avatar, $_SESSION['pseudo']));
	
	$_SESSION['pseudo'] = $pseudo;

	
}

elseif ($traitement == 2)
//Il s'agit du formulaire pour changer les coordonnées
{
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	
	//On entre les nouvelles données dans la base
	$requete="UPDATE utilisateur SET nom=?, prenom=?, email=?, telephone=? WHERE pseudo=?";
	$reponse=$pdo->prepare($requete);
	$reponse->execute(array($nom, $prenom, $email, $telephone, $_SESSION['pseudo']));
	
}

elseif ($traitement == 3)
// Il s'agit du formulaire pour changer les caractéristiques
{
	$age = $_POST['age'];
	$sexe = $_POST['sexe'];
	$description = $_POST['description'];
	
	//On entre les nouvelles données dans la base
	$requete="UPDATE utilisateur SET age=?, sexe=?, description=? WHERE pseudo=?";
	$reponse=$pdo->prepare($requete);
	$reponse->execute(array($age, $sexe, $description, $_SESSION['pseudo']));
}


?>	

<h3> Les informations ont été modifiées avec succès! </h3> 


<?php
include "pied.php";
?>