<?php
$title = "Accueil";
include "entete.php";
?>		

<div class="page-header">
	<h1>Bienvenue sur TravelBuddy !</h1>
</div>

<div class="accueil">

	<p>Vous avez planifié un voyage ? Un roadtrip ? Mais votre partenaire vous a lâché au dernier moment, vous en rêviez, et vous ne voulez pas l'annuler ? Si vous cherchez un partenaire, TravelBuddy est fait pour vous !</p>
	<p>Sur TravelBuddy, retrouvez de nombreuses annonces de recherche de partenaire de voyage, et pas seulement pour l'Europe, mais dans le Monde entier !</p>
	<p>Et si vous aviez déjà organisé un voyage, pas de problème ! Il vous suffira de partager votre annonce et le tour est joué !</p>
	<br/>

	<p>Comment vous y prendre ? C'est très simple, il vous suffit de vous connecter sur la page <a href="connexion.php">Mon Compte</a>, et de partir en quête du Buddy idéal !</p>
	<p>Vous n'avez pas de compte ? Alors <a href="inscription.php">devenez un Buddy</a> !</p>
</div>

<h1 id="accueil_exemple">Exemple de Trajet</h1>

<h1>France vers Italie</h1>

<section class="section_compte">
	<fieldset>
		<legend> Organisateur </legend>
		
		<img src='image/avatars/accueil.jpg' alt='photo de profil' width='160' height='160' />
		<p><b>Buddy : </b>Team TravelBuddy</p>
		</br><p><b> email : </b> <a href="mailto:assistance-travelbuddy@gmail.com">assistance-travelbuddy@gmail.com</a></p>
		<p><b> téléphone : </b>0556653442</p>
		
	</fieldset>
	
	<fieldset>
		<legend> Trajet </legend>
			
		<p><b>Départ :</b> Paris en France </p>
		<p><b>Arrivée :</b> Rome en Italie</p>
		<p><b>Départ le </b>18/05/16<b> pour </b>3 Semaines</p>
		
	</fieldset>
	
	<fieldset>
		<legend> Caractéristiques </legend>
		
		<p><b>Description :</b> Nous sommes un groupe de 3 amis en quête de découverte des différentes saveurs de l'Italie. Nous recherchons une personne supplémentaire afin de former un quatuor !</p>			
		<p><b>Nombre de personnes organisant :</b> 3</p>	
		<p><b>Nombre de participants souhaités :</b> 1</p>	
		<p><b>Objectifs :</b> paysages, dégustation, monuments</p> 		
	
	</fieldset>
</section>

<?php
include "pied.php";
?>