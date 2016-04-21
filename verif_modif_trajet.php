<?php
$title = "Modification";
include "entete.php";
require_once("connexion_base.php");

$id_trajet = $_POST['id_trajet'];

//On traite la modification des données sur la partie trajet
if ($_POST['partie_modif'] == "trajet")
{
	if (empty($_POST['pays_depart']) or empty($_POST['ville_depart']) or empty($_POST['pays_arrivee']) or empty($_POST['ville_arrivee']) or empty($_POST['date_depart']) or empty($_POST['duree']))
	{
		echo "Vous devez remplir tous les champs "; ?>
		<form action="modifier_trajet.php" method="post">
			<div class="control-group">
			  <div class="controls">
				<input type="hidden" name="id_trajet" value="<?php echo $id_trajet; ?>" />
				<input type="hidden" name="partie_modif" value="trajet" />
				<button class="btn btn-primary" id="bouton_modifier">Retour</button>
			  </div>
			</div>
		</form>	
		<?php
		include "pied.php";
		exit();
	
	}
	else
	{	
		$pays_depart = $_POST['pays_depart'];
		$pays_arrivee = $_POST['pays_arrivee'];
		$ville_depart = $_POST['ville_depart'];
		$ville_arrivee = $_POST['ville_arrivee'];
		$date_depart = $_POST['date_depart'];
		$duree = $_POST['duree'];

		//On entre les nouvelles données dans la base
		$requete="UPDATE trajet SET ville_depart=?, ville_arrivee=?, pays_depart=?, pays_arrivee=?, date_depart=?, duree=? WHERE id=?";
		$reponse=$pdo->prepare($requete);
		$reponse->execute(array($ville_depart, $ville_arrivee, $pays_depart, $pays_arrivee, $date_depart, $duree, $id_trajet));
	
	}

}
else
//Les modifications portent donc sur la partie caractéristiques
{
	if (empty($_POST['description']) or empty($_POST['nb_base']) or empty($_POST['nb_participants']) or empty($_POST['objectif1']) or empty($_POST['objectif2']) or empty($_POST['objectif3']))
	{
		echo "Vous devez remplir tous les champs. Seul le dernier objectif n'est pas obligatoire."; ?>
		<form action="modifier_trajet.php" method="post">
			<div class="control-group">
			  <div class="controls">
				<input type="hidden" name="id_trajet" value="<?php echo $id_trajet; ?>" />
				<input type="hidden" name="partie_modif" value="caracteristique" />
				<button class="btn btn-primary" id="bouton_modifier">Retour</button>
			  </div>
			</div>
		</form>	
		<?php
		include "pied.php";
		exit();
	
	}
	else
	{	
		$description = $_POST['description'];
		$nb_base = $_POST['nb_base'];
		$nb_participants = $_POST['nb_participants'];
		$objectif1 = $_POST['objectif1'];
		$objectif2 = $_POST['objectif2'];
		$objectif3 = $_POST['objectif3'];
		//On vérifie si le dernier objectif (optionnel) est rempli
		if (empty($_POST['objectif4'])) $nb_obj = 2;
		else 
		{
			$objectif4 = $_POST['objectif4']; 
			$nb_obj = 3;
		}

		//On entre les nouvelles données dans la base trajet
		$requete="UPDATE trajet SET description=?, nb_base=?, nb_participants=? WHERE id=?";
		$reponse=$pdo->prepare($requete);
		$reponse->execute(array($description, $nb_base, $nb_participants, $id_trajet));
	
	
		// On récupère les id des objectifs du trajet   
		$requete = "SELECT * FROM objectif WHERE id_trajet = ? ";
		$reponse = $pdo->prepare($requete);
		$reponse->execute(array($id_trajet));
		$enregistrements = $reponse->fetchAll();
		
		$nbReponses = count($enregistrements) ;
		
		//On fait -1 pour avoir directement l'index du tableau pour trouver l'objectif et non pas seulement le nombre d'objectifs
		$index = $nbReponses - 1;
		
		
		if($index == 3)
		// Il y a 4 objectifs dans la base
		{
			if($nb_obj == 2)
			{
				//Il y a seulement 3 objectifs à ajouter donc on en supprime 1 en BDD
				$requete="DELETE FROM objectif WHERE id=?";
				$reponse=$pdo->prepare($requete);
				$reponse->execute(array($enregistrements[$index]['id']));
			}
			else
			{
				//Il y a 4 objectifs à mettre dans 4 objectifs en table donc on en met 1 ici et les autres plus bas
				$nom = $objectif4;
				$requete="UPDATE objectif SET nom=? WHERE id=?";
				$reponse=$pdo->prepare($requete);
				$reponse->execute(array($nom, $enregistrements[$index]['id']));
				//on a ajouté un objectif donc on l'enlève du nombre d'objectifs à ajouter
				$nb_obj = 2;
			}
		}
		
		// on a gérer les 4eme objectif dans la base donc on l'enlève du décompte et on repart avec 3 objectifs en base (donc l'index de 0 à 2)
		$nbReponses = 3;
		$index = $nbReponses - 1;
		
		if($nb_obj == 3)
		//il y a 4 objectifs à mettre pour seulement 3 en bases donc on doit créer un nouveau champ
		{
			$requete="INSERT INTO objectif (id_trajet, nom) VALUES(?,?)";
			$reponse=$pdo->prepare($requete);
			$reponse->execute(array($id_trajet, $objectif4));
			$nb_obj = 2;
		}
		
		//Arrivé ici il y a forcément 3 nouveaux objectifs pour 3 objectifs en BDD
		
		//On fait un tableau d'objectifs avec les noms des objectifs dedans pour ensuite avoir les variables dans la boucle
		$objectifs = array('objectif1', 'objectif2', 'objectif3');
		
		while ($nb_obj >=0 and $index >= 0 )
		//Ici on va parcourir à la fois le tableau des enregistrements et le tableau des objectifs pour faire correspondre un nouvel objectif à un ancien dans la base
		{
			//On prend les objectifs les uns après les autres dans $nom pour la requête, avec l'aide du tableau objectifs
			$nom = $$objectifs[$nb_obj];
			
			$requete="UPDATE objectif SET nom=? WHERE id=?";
			$reponse=$pdo->prepare($requete);
			$reponse->execute(array($nom, $enregistrements[$index]['id']));
			
			//on décrémente pour passer à l'objectif suivant à ajouter
			$nb_obj = $nb_obj - 1;
			
			//on décrémente le nombre d'enregistrements pour passer à l'objectif suivant dans la BDD
			$index = $index - 1;
		}
	}
}

?>

<h3> Les informations ont été modifiées avec succès! </h3> 


<?php
include "pied.php";
?>