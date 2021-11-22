<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'moduleconnexion');

// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <header>
        <nav id= "lehaut"><h1><a href="index.php" title="Accueil">CitaJeux</a></h1></nav> &emsp;
        <h2 id="conninscription"><a href="inscription.php">Inscription</a> &emsp;
        <a href="connexion.php">Connexion</a></h2>
    </header>
    <body>
        
</html>

