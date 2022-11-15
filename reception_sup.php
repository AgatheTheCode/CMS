<?php

include('include/connexion.php');
include('include/auteur.php');


$pdo = connexion();

$id = $_GET['id'];

// Auteur::delete($id);
header("Location: index.php");
