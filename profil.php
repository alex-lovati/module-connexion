<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
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
if (isset($_REQUEST['login'], $_REQUEST['prenom'], $_REQUEST['nom'], $_REQUEST['password'])){
  $login = stripslashes($_REQUEST['login']);
  $login = mysqli_real_escape_string($conn, $login); 
  $prenom = stripslashes($_REQUEST['prenom']);
  $prenom = mysqli_real_escape_string($conn, $prenom);
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  $id='id';
    $query = "UPDATE utilisateurs
            SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password'
            WHERE id=$id";
    $res = mysqli_query($conn, $query);
    if($res){
        echo "<div class='sucess'>
                <h3>Vos informations ont été enregistrées.</h3>
            </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Modifier mes informations</h1>
  <input type="text" class="box-input" name="login" placeholder="Login" required />
    <input type="text" class="box-input" name="prenom" placeholder="prenom" required />
    <input type="text" class="box-input" name="nom" placeholder="nom" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="password" class="box-input" name="password" placeholder="Confirmez votre mot de passe" required />
    <input type="submit" name="submit" value="Enregistrer mes informations" class="box-button" />
    <!-- <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p> -->
</form>
<?php } ?>
</body>
</html>