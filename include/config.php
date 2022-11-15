<?php //script de connection à la base de données

function connexion()
{
  //connection à la base de données en pdo
  //syntaxe $pdo = new PDO('mysql:host=serveur;dbname=nom de la base de données', 'nom d'utilisateur', 'mot de passe');
  $pdo = new PDO('mysql:host=localhost;dbname=CMS_test;charset=utf8', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if ($pdo) {
    return $pdo;
  } 
  else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}