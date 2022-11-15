<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="controleur.php?page=auteur&action=read">Affichage des auteurs</a></li>
        <li><a href="controleur.php?page=auteur&action=create">Création d'un auteur</a></li>
        <form action="controleur.php?page=auteur&action=create" method="post">
            <input type="text" name="nom" placeholder="Saisir un nom">
            <input type="text" name="prenom" placeholder="Saisir un prénom">
            <input type="submit" value="Envoyer">
        </form>
        <li><a href="controleur.php?page=auteur&action=update">Modifier un auteur</a></li>
        </form>
        <li><a href="controleur.php?page=auteur&action=delete&id=37">Suppression de l'auteur 37</a></li>
        <li><a href="controleur.php?page=editeur&action=read&id=1">Affichage de l'éditeur </a></li>
        <li><a href="controleur.php?page=editeur&action=exec">Fausse action sur les éditeurs</a></li>
        <li><a href="controleur.php?page=xxx">Page inexistante</a></li>
    </ul>
<!--
    <?php

    include("include/auteur.php");
    include("include/connexion.php");
    // récupération de la variable page sur l'URL
    if (isset($_GET['page'])) $page = $_GET['page'];
    else $page = '';

    // récupération de la variable action sur l'URL
    if (isset($_GET['action'])) $action = $_GET['action'];
    else $action = 'read';

    // récupération de l'id s'il existe (par convention la clé 0 correspond à un id inexistant)
    if (isset($_GET['id'])) $id = intval($_GET['id']);
    else $id = 0;

    // test des différents choix
    // switch ($page) {
    //     case 'auteur':
    //         echo '<h1>Page auteur</h1>';
    //         switch ($action) {
    //             case 'read':
    //                 if ($id > 0) {
    //                     $auteur = Auteur::readOne($id);
    //                     $auteur->affichedetail();
    //                 } else {
    //                     $tableau = Auteur::readAll();
    //                     foreach ($tableau as $auteur) $auteur->afficher();
    //                 }
    //                 break;
    //             case 'create':
    //                 $auteur = new Auteur('', '');
    //                 $auteur->chargePOST();
    //                 $auteur->create();
    //                 header("Location: controleur.php?page=auteur&action=read");
    //                 break;
    //             case 'edit':
    //                 $auteur = Auteur::readOne($id);
    //                 $auteur->afficheform();
    //                 break;
    //             case 'update':
    //                 $auteur = new Auteur('', '');
    //                 $auteur->chargePOST();
    //                 $auteur->update();
    //                 header("Location: controleur.php?page=auteur&action=read");
    //                 break;
    //             case 'delete':
    //                 Auteur::delete($id);
    //                 header("Location: controleur.php?page=auteur&action=read");
    //                 break;
    //             default:
    //                 echo 'Action non reconnue';
    //         }
    //         break;
    //     case 'editeur':
    //         echo '<h1>Page éditeur</h1>';
    //         switch ($action) {
    //             case 'read':
    //                 echo 'Affichage de l\'éditeur';
    //                 break;
    //             default:
    //                 echo 'Action non reconnue';
    //         }
    //         break;
    //     default:
    //         echo '<h1>Page d\'erreur ou page d\'accueil</h1>';
    // }
    ?> -->
</body>

</html>