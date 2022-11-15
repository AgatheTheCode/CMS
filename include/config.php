<?php //script de connection à la base de données

function connexion()
{
  //connection à la base de données en pdo
  //condition de vérificaiton de l'environnement de développement / production
  //syntaxe $pdo = new PDO('mysql:host=serveur;dbname=nom de la base de données', 'nom d'utilisateur', 'mot de passe');

  if (str_contains($_SERVER['SERVER_NAME'], 'NOM_DU_SERVEUR')) {
    $pdo = new PDO('mysql:host=ADRESSE_DU_SERVEUR;dbname=nom_de_la_base;charset=utf8', 'nom_utilisateur', 'mot_de_passe'); //à modifier
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} else {
    //local
    $pdo = new PDO('mysql:host=localhost;dbname=biblio;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

  if ($pdo) {
    return $pdo;
  } 
  else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}