<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
		<link href="css/style.css" rel="stylesheet" media="all" type="text/css" media="all" />
        <meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="image/logo.png" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="dist/css/bootstrap.css" />
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="dist/js/bootstrap.js"></script>
    </head> 
    <body>
		
		<div class="container">
		
			
			<header>
					<h1 id="TB">TravelBuddy</h1>
					
			
			</header>
			
			<nav class="navbar navbar-default" id="nav">			
				<ul class="nav nav-pills">
					<li role="presentation" <?php if ($title=="Accueil") echo 'class="active"'; ?> ><a href="accueil.php">Accueil</a></li>
					<li role="presentation" <?php if ($title=="Création de Trajet") echo 'class="active"'; ?> ><a href="creation_trajet.php">Création de Trajet</a></li>
					<li role="presentation" <?php if ($title=="Trajets") echo 'class="active"'; ?> ><a href="trajet.php">Recherche de Trajet</a></li>
					<li role="presentation" <?php if ($title=="Mon Compte") echo 'class="active"'; ?> ><a href="connexion.php">Mon Compte</a></li>
				</ul>
			</nav>