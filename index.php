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
    <body>
        <header>
            <nav id= "lehaut"><h1><a class=href href="index.php" title="Accueil">CitaJeux</a></h1></nav> &emsp;
            <h2 id="conninscription"><a class= href href="inscription.php">Inscription</a> &emsp;
            <a class= href href="connexion.php">Connexion</a></h2>
        </header>
        <main>
        <div class="rectangle">
                </div>
                <div id= "dmc"><img src="https://ps3-img.gamergen.com/devil-may-cry-3-jaquette_03A9052C00071614.jpg"></div>
        
</html>

