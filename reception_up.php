<?php

include('include/connexion.php');
include('include/auteur.php');


$pdo = connexion();
$cle = $_GET['id'];

// // On récupère un auteur existant dans un objet
// $auteur = Auteur::readOne($cle);

// // On modifie ses attributs (mais pas la clé)
$auteur->modifier($_GET['nom'], $_GET['prenom']);

// // On exécute la requête de mise à jour
$auteur->update();
header("Location: index.php");
