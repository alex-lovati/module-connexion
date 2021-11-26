<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'moduleconnexion');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
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
            <p id="dispo">BIENTOT DISPONIBLE!!!!</p>
                </div>
        </main>
    </body>
        
</html>

