<?php 
// définition des paramètres de connexion à la base de données
$config_base['hote']        = "mysql.hostinger.fr";
$config_base['utilisateur'] = "u517109113_zaphy";
$config_base['motdepasse']  = "M2CAYQ4pjr";
$config_base['nom_base']    = "u517109113_bdd";

// connexion à la base de données
try {
    $pdo = new PDO(	"mysql:host={$config_base['hote']};
                    dbname={$config_base['nom_base']}", 
                    "{$config_base['utilisateur']}", 
                    "{$config_base['motdepasse']}");
    
    // afficher les messages d'erreurs pour trouver les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    // jeu de caractères : UTF-8
    $pdo->query("SET NAMES utf8");
    $pdo->query("SET CHARACTER SET utf8");
}
catch (PDOException $exception) {
    echo "Connexion échouée : " . $exception->getMessage();
}
?>