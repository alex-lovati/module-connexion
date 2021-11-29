<?php
// $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', ''); 
$bdd = new PDO('mysql:host=localhost;dbname=alex-lovati_moduleconnexion', 'alex', 'lovati');
        if (isset($_POST['submit'])){
            $erreur = "";
            $login = htmlspecialchars($_POST['login']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $password = htmlspecialchars($_POST["password"]);
            $confirmation = htmlspecialchars ($_POST['password2']);

        if (!empty($_POST['login']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){
            $loginlenght = strlen($login);
            $requete=$bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? ");
            $requete->execute(array($login));
            $loginexist= $requete->rowCount();


            if ($loginlenght > 255)
            $erreur= "Votre pseudo ne doit pas depasser 255 caractères !";
            elseif($password !== $confirmation)
                    $erreur="Les mots de passes sont differents !";
            if($loginexist !== 0)
            $erreur = "Login deja pris !";
            if($erreur == ""){
                $hashage = password_hash($password, PASSWORD_BCRYPT);
                $insertmbr= $bdd->prepare("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?, ?, ?, ?)");
                $insertmbr->execute(array($login, $prenom, $nom, $hashage));
                $erreur = "Votre compte à bien été crée !";
            }
        }
            else{
                $erreur="Tout les champs doivent etre remplis !";
            }
}?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body class="fond">
    <header>
            <nav id= "lehaut"><h1><a class=href href="index.php" title="Accueil">CitaJeux</a></h1></nav> &emsp;
            <h2 id="conninscription"><a class= href href="inscription.php">Inscription</a> &emsp;
            <a class= href href="connexion.php">Connexion</a></h2>
    </header>
<main>
            <div id="deplacement_form">
                <form id="form_inscription" action="" method="post">
                    <div style="color: yellow;"><?php
                    if (isset($erreur)){
                        echo $erreur;
                    }
                    ?></div>
                    <h2 id="h1_inscription">S'inscrire</h1><br>
                        <input type="text" class="box-input" name="login" placeholder="Login" required /> <br>
                        <input type="text" class="box-input" name="prenom" placeholder="prenom" required /> <br>
                        <input type="text" class="box-input" name="nom" placeholder="nom" required /> <br>
                        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required /> <br>
                        <input type="password" class="box-input" name="password2" placeholder="Confirmez votre mot de passe" required /> <br><br>
                        <input type="submit" name="submit" value="S'inscrire" class="box_button" /> <br><br>
                        <p id="box_register">Déjà inscrit? <a class="color_link" href="connexion.php">Connectez-vous ici</a></p> 
                </form>
                </div>

</div>
            </div>
        </main>
</form>
</body>
</html>