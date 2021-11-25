<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');
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
<form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="login" placeholder="Login" required />
    <input type="text" class="box-input" name="prenom" placeholder="prenom" required />
    <input type="text" class="box-input" name="nom" placeholder="nom" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="password" class="box-input" name="password2" placeholder="Confirmez votre mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
</form>
</body>
</html>