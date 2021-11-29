<?php
// $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', ''); 
$bdd = new PDO('mysql:host=localhost;dbname=alex-lovati_moduleconnexion', 'alex', 'lovati');
if(isset($_GET['type']) AND $_GET['type'] == 'utilisateurs') {

}
if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
    $req->execute(array($supprime));
}

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
    $req->execute(array($supprime));
}

$membres = $bdd->query('SELECT * FROM utilisateurs ORDER BY id DESC LIMIT 0,5');

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
  <div id="admin_main">
    <h1 id="h1_inscription">Administration</h1>
      <ul>
          <?php while($m = $membres->fetch()) { ?>
          <li><?= $m['id'] ?> : Login : <?= $m['login'] ?> Prenom : <?= $m['prenom'] ?> Nom : <?= $m['nom'] ?> </li>
          <?php } ?>
      </ul>
    <br /><br />
    <a href="deconnexion.php"><input class="box_button" type="button" value="Déconnexion"></a>
  </div>
</main>
</body>
</html>