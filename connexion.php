<?php

require("index.php");
session_start();
if(isset($_POST['submit'])) {
    if(empty($_POST['login'])) {
        echo "Le champ Pseudo est vide.";
    } else {
        if(empty($_POST['password'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            $login = htmlentities($_POST['login'],);
            $password = htmlentities($_POST['password']);
            $mysqli = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } 
            else {
                $Requete = mysqli_query($mysqli,"SELECT * FROM utilisateurs WHERE login = '".$login."' and password='".hash('sha256', $password)."'");
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                }  
                if($login=="admin"and $password=="admin"){
                  $_SESSION['login'] = $login;
                    header("location: admin.php");
                    echo "Vous êtes à présent connecté !";    
            }
            else {
                    $_SESSION['login'] = $login;
                    header("location: profil.php");
                    echo "Vous êtes à présent connecté !";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="login" placeholder="Login">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
</form>
</body>
</html>