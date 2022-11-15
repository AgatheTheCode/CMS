<?php


include('include/connexion.php');
include('include/auteur.php');

// fabrication et récupération des tous les objets en une fois
$tableau = Auteur::readAll();

// utilisation d'une boucle pour afficher les objets
foreach ($tableau as $auteur) {
    $auteur->afficher();
}
// // Sélection auteur avec id

// $auteur = Auteur::readOne(41);

// // affichage du résultat
// $auteur->afficher2();


// // // Ajouter

// // $auteur = new Auteur();

// // // On lui donne des valeurs
// // $auteur->modifier('DEBIEVE', 'Rockstar');

// // // On exécute la requête
// // $auteur->create();

// // // On vérifie si la clé a été mise à jour
// // echo 'Nouvel Id : ' . $auteur->id;

// // // On suppose qu'on a défini une valeur pour la clé
// // $id = 54;

// // // On appelle la méthode statique avec cette clé
// // Auteur::delete($id);


// // Update

// // On suppose qu'on a défini une valeur pour la clé
// $cle = 71;

// // On récupère un auteur existant dans un objet
// $auteur = Auteur::readOne($cle);

// // On modifie ses attributs (mais pas la clé)
// $auteur->modifier('DEBIEVE', 'Debilly');

// // On exécute la requête de mise à jour
// $auteur->update();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ajouter un auteur</h1>
    <form action="reception_auteur.php" method="post">
        <input type="text" name="nom" placeholder="Saisir un nom">
        <input type="text" name="prenom" placeholder="Saisir un prénom">
        <input type="submit" value="Envoyer">
    </form>

    <h1>Supprimer un auteur</h1>
    <form method="get" action="reception_sup.php">
        <input type="text" name="id" placeholder="Entrez l'ID">
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>

    <h1>Modifier un auteur</h1>
    <form method="get" action="reception_up.php">
        <input type="text" name="id" placeholder="Saisir l'id">
        <input type="text" name="nom" placeholder="Saisir un nom">
        <input type="text" name="prenom" placeholder="Saisir un prenom">
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>

</body>

</html>