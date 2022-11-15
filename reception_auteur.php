<?php


include('include/auteur.php');
include('include/connexion.php');

// $auteur = new Auteur('', '');
$auteur->chargePOST();
$auteur->create();
header("Location: index.php");
