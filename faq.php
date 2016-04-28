<?php
$title = "FAQ";
include "entete.php";
?>
	<div class="page-header">
		<h1>Foire Aux Questions</h1>
	</div>
	
	<div class="faq">
		<h3 class="faq_question">J'effectue une recherche de trajet dans un pays, mais il n'y a rien qui s'affiche.</h3>
		<p>Il est probable que votre date de départ ne comprenne aucun trajet, essayez à une autre date. Sinon, il n'y a sans doute aucun trajet disponible dans ce pays-là.</p>
	</div>
	
	<div class="faq">
		<h3 class="faq_question">J'ai trouvé un trajet qui m'intéresse, mais je ne trouve pas les informations de contact de l'organisateur.</h3>
		<p>Si les informations ne sont pas visibles, c'est parce que vous n'êtes pas connecté. Si vous n'avez pas de compte, nous vous invitons à en créer un <a href="inscription.php">ici</a>.</p>
	</div>
	
	<div class="faq">
		<h3 class="faq_question">J'essaie de m'inscrire, mais mon inscription ne se valide pas.</h3>
		<p>Vous oubliez peut être de renseigner tous les champs. Chaque information est importante. Peut-être vous êtes vous trompé sur la confirmation du mot de passe, ou peut-être votre pseudo est déjà pris.</p>
	</div>
	
	<div class="faq">
		<h3 class="faq_question">Je n'aime plus ma photo de profil. Comment en changer ?</h3>
		<p>Il vous suffit de vous connecter à votre compte, de vous rendre sur la page <a href="connexion.php">Mon Compte</a>, et de cliquer sur le bouton Modifier dans le cadre des informations de connexion.</p>
	</div>
	
	<div class="faq">
		<h3 class="faq_question">Je veux participer à un trajet. Comment faire ?</h3>
		<p>Rendez-vous sur la page du trajet en question. Si vous êtes connecté, vous devriez avoir accès aux informations de contact de l'organisateur. Vous pouvez ensuite lui envoyer un mail à l'adresse indiquée, ou lui téléphoner.</p>
	</div>
<?php
include "pied.php";
?>