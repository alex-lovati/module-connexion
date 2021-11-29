<?php
session_start();
// $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', ''); 
$bdd = new PDO('mysql:host=localhost;dbname=alex-lovati_moduleconnexion', 'alex', 'lovati');
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

