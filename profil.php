<?php
session_start();
// $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', ''); 
$bdd = new PDO('mysql:host=localhost;dbname=alex-lovati_moduleconnexion', 'alex', 'lovati');
if(isset($_SESSION['id']) && $_SESSION['id'] > 0){
    $requtilisateur = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $requtilisateur->execute(array($_SESSION['id']));
    $infoutilisateur = $requtilisateur->fetch();

    if(isset($_POST['newlogin']) && !empty($_POST['newlogin']) && $_POST['newlogin'] != $infoutilisateur['login']){
        $login= $_POST['newlogin']; 
        $requetelogin = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $requetelogin->execute(array($login));
        $loginexist = $requetelogin->rowCount(); 

        if($loginexist !== 0){
            $msg = "Le login existe déjà !";
        }
        else {
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $insertlogin->execute(array($newlogin, $_SESSION['id']));
        $_SESSION['login']=$newlogin; 
        header('Location: profil.php');
        }
    }
    if(isset($_POST['newnom']) && !empty($_POST['newnom']) && $_POST['newnom'] != $infoutilisateur['nom'])
    {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
        $insertnom->execute(array($newnom, $_SESSION['id']));
        header('Location: profil.php');
    }
    if(isset($_POST['newprenom']) && !empty($_POST['newprenom']) && $_POST['newprenom'] != $infoutilisateur['prenom'])
    {
        $newprenom = htmlspecialchars($_POST['newprenom']);
        $insertprenom = $bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
        $insertprenom->execute(array($newprenom, $_SESSION['id']));
        header('Location: profil.php');
    }
    if(isset($_POST['newmdp']) && !empty($_POST['newmdp']) && isset($_POST['newmdp2']) && !empty($_POST['newmdp2'])) {
    $mdp1 = $_POST['newmdp'];
    $mdp2 = $_POST['newmdp2'];
        
        if($mdp1 == $mdp2)
        {
            $hachage = password_hash($mdp1, PASSWORD_BCRYPT);
            $insertmdp = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
            $insertmdp->execute(array($hachage, $_SESSION['id']));
            header('Location: profil.php');
        }
        else
        {
            $msg = "Vos mots de passes ne correspondent pas !";
        }
    }
    if(isset($_POST['newlogin']) && $_POST['newlogin'] == $infoutilisateur['login'])
    {
        header('Location: profil.php');
    }
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
          <div id="deplacement_form">
          <form id="form_inscription" action="" method="post">
                <?php 
                if(isset($msg))
                {
                echo '<font color="red">'.$msg.'</font><br /><br />'; 
                }
            ?>
              <h2 id="h1_inscription">Modifier mes informations</h1><br>
                <input type="text" class="box-input" name="newlogin" placeholder="Login" required /><br>
                <input type="text" class="box-input" name="newprenom" placeholder="prenom" required /><br>
                <input type="text" class="box-input" name="newnom" placeholder="nom" required /><br>
                <input type="password" class="box-input" name="newmdp" placeholder="Mot de passe" required /><br>
                <input type="password" class="box-input" name="newmdp2" placeholder="Confirmez votre mot de passe" required /><br><br>
                <input type="submit" name="submit" value="Enregistrer mes informations" class="box_button" /><br>
                <a href="deconnexion.php"><input class="box_button" type="button" value="Déconnexion"></a>
            </form>
        </div>
        </main>
</body>
</html>