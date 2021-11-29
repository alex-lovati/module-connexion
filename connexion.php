<?php
session_start();
// $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', ''); 
$bdd = new PDO('mysql:host=localhost;dbname=alex-lovati_moduleconnexion', 'alex', 'lovati');

if(isset($_POST['submit'])){
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];

    if(!empty($login) AND !empty($password)){
        $requeteutilisateur = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $requeteutilisateur->execute(array($login));
        $result = $requeteutilisateur->fetchAll();
                if (count($result) > 0){
                    $sqlPassword = $result[0]['password'];
                    if(password_verify($password, $sqlPassword)){
                        $_SESSION['id'] = $result[0]['id'];
                        $_SESSION['login'] = $result[0]['login'];
                        $_SESSION['nom'] = $result[0]['nom'];
                        $_SESSION['prenom'] = $result[0]['prenom'];
                        header("Location: profil.php");   
                    }
                    else{ $erreur = "Mauvais login !"; }
                }
                    else{ $erreur = "Mauvais mot de passe !"; }

                    if ($_SESSION['login'] == 'admin'){
                        header("Location: admin.php");
                    }
    }
                    else{ $erreur = "Tous les champs doivent être remplis !"; }
}
?>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    </head>
    <body>
    <header>
            <nav id= "lehaut"><h1><a class=href href="index.php" title="Accueil">CitaJeux</a></h1></nav> &emsp;
            <h2 id="conninscription"><a class= href href="inscription.php">Inscription</a> &emsp;
            <a class= href href="connexion.php">Connexion</a></h2>
    </header>
    <main id="main_la">
        <div id="deplacement_form">
            <form id="form_inscription" action="" method="post" name="login">
                <div style="color: yellow;"><?php
                    if (isset($erreur)){
                        echo $erreur;
                    }
                ?></div>
                <h2 id="h1_inscription">Connexion</h1><br>
                    <input type="text" class="box-input" name="login" placeholder="Login" required><br>
                    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required><br><br>
                    <input type="submit" value="Se connecter" name="submit" class="box_button"><br><br>
                <p class="box_register">Vous êtes nouveau ici? <a class="color_link" href="inscription.php">S'inscrire</a></p>
            </form>
        </div>
    </main>
    <footer>
    </footer>
    </body>
</html>