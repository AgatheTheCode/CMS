<?php
// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Convertit l'identifiant en entier
$id = intval($id);
//Include config file
include('include/twig.php');
$twig = init_twig();

// include('include/config.php');
// $pdo = connexion();

// include('include/function.php');
// $element = Elements::readAll();



include('controleur.php');
// $elements = Elements::readAll();

// var_dump($elements);

echo $twig->render('elements.twig', [

    // 'elements' => $elements,
]);
