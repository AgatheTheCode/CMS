<?php
include('include/config.php');
include('include/function.php');
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css" />
    <title>Back-office</title>
  </head>

<body class="d-flex flex-column container-fluid">
    <wrapper class="justify-content-center w-75">
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

    <h1>Supprimer un element</h1>
    <form method="get" action="reception_sup.php">
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

    <h1>Modifier un element</h1>
    <form method="get" action="reception_up.php">
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
<!--
    <h1>Créer une page </h1>
    <form method="get" action="reception_page.php">
    <input type="text" name="nom" placeholder="Saisir un nom de page">
        <input type="text" name="titre" placeholder="Saisir un titre">
        <input typer="text" name="description" placeholder="Saisir une description">
        <input type="text" name="keywords" placeholder="Saisir des mots clés">
        <input type="text" name="url" placeholder="Saisir une url"> -->
        <!-- AJOUT DES ELEMENTS EN TWIG -->
        <!-- <input type="submit" value="Envoyer"> -->
</wrapper>



    <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
    <script src="js/main.js" ></script>
</body>

</html>