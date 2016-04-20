<?php
$title = "Deconnexion";
include "entete.php";

require_once("connexion_base.php");

unset($_SESSION['membre_id']);
unset($_SESSION['pseudo']);
?>

<h1> Au revoir et à bientôt! </h1>


<?php
include "pied.php";
?>