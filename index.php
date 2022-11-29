<?php


include('include/config.php');
include('include/function.php');

// fabrication et récupération des tous les objets en une fois
$tableau = Elements::readAll();

// utilisation d'une boucle pour afficher les objets
foreach ($tableau as $elements) {
    $elements->afficher();
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
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css" />
        <title>Document</title>
</head>

<body>
    <h1>Ajouter un element</h1>
    <form action="reception_element.php" method="post">
        <input type="text" name="balise" placeholder="Saisir un nom de balise">
        <input type="text" name="content" placeholder="Saisir le contenu">
        <input typer="text" name="class" placeholder="Saisir un nom de classe CSS (Bootstrap)">
        <input type="text" name="src" placeholder="Saisir la source de l'image">
        <input type="text" name="alt" placeholder="Saisir un texte alternatif">
        <input type="text" name="href" placeholder="Saisir le lien">
        <input type="text" name="role" placeholder="Saisir le role">
        <input type="text" name="id_css" placeholder="Saisir un id css (Attention il doit être unique !)">
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



    <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
    <script src="js/main.js" ></script>
</body>

</html>