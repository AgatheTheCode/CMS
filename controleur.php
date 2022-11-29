<?php
// include('../include/config.php');


include('include/function.php');
include_once('include/twig.php');

$twig = init_twig();

// Analyse des variables sur l'URL qui définissent la route (page/action/id)
// Les 3 variables $page, $action, $id sont définies

// Récupération de la variable page sur l'URL
if (isset($_GET['page'])) $page = $_GET['page']; else $page = '';

// Récupération de la variable action sur l'URL
if (isset($_GET['action'])) $action = $_GET['action']; else $action = 'read';

// Récupération de l'id s'il existe (par convention la clé 0 correspond à un id inexistant)
if (isset($_GET['id'])) $id = intval($_GET['id']); else $id = 0;

/* Le contrôleur analyse la requête ou la route (ici la page à visualiser)
 * En fonction de la page choisie, il
 * - détermine la vue à utiliser dans la variable $view
 * - fait appel au modèle pour récupérer les données dans la variable $data
 */
switch ($page) {
	case 'elements' :
		switch ($action) {
			case 'read' :
				// Affiche l'elements dont l'id est sur l'URL
				// Utilise la vue elements simple avec un message
				$view = 'element.twig';
				$data = [
					// La requête readOne récupère les données à afficher
					'elements' => Elements::readOne($id),
					'message' => 'Détails de l\'elements'
				];
				break;
			case 'create' :
				// Création d'un elements (vide)
				$elements = new Elements();
				// Récupère les données envoyées par le formulaire (POST)
				$elements->chargePOST();
				// Requête de création de l'elements
				$elements->create();
				// Utilise la vue elements simple avec un message
				$view = 'elements.twig';
				$data = [
					'elements' => $elements,
					'message' => 'elements créé'
				];
				break;
			case 'edit' :
				// Modification d'un elements : étape 1 => affiche l'elements dans un formulaire
				$view = 'edit_elements.twig';
				// L'elements à modifier est récupéré avec la requête readOne
				$data = ['elements' => Elements::readOne($id)];
				break;
			case 'update' :
				// Modification d'un elements : étape 2 => met à jour la base de données
				// Création d'un elements (vide)
				$elements = new Elements();
				// Récupère les données du formulaire = l'elements modifié
				$elements->chargePOST();
				// Réquête de mise à jour
				$elements->update();
				// Utilise la vue elements simple avec un message
				$view = 'elements.twig';
				$data = [
					'elements' => $elements,
					'message' => 'elements modifié'
				];
				break;
			case 'delete' :
				// Récupération de l'elements pour l'afficher avant la suppression
				$elements = Elements::readOne($id);
				// Supression de l'elements
				Elements::delete($id);
				// Utilise la vue elements simple avec un message
				$view = 'elements.twig';
				$data = [
					'elements' => $elements,
					'message' => 'Suppression de l\'elements'
				];
				break;
			default :
				// Page vide ou page d'erreur
				$view = 'base.twig';
				$data = [];
		}
		break;
	case 'form_elements' :
		// Page affichant un formulaire de saisie d'un nouvel elements
		// Pourrait aussi être une action de la page elements
		$view = 'form_elements.twig';
		$data = [];
		break;
	case 'init' :
		// Page spéciale pour réinitialiser la base de données
		Elements::init();
	case 'elements' :
	default :
		// La page d'accueil affiche tous les elementss
		$view = 'elements.twig';
		$data = ['elements' => Elements::readAll()];
}

// Le contrôleur charge la vue avec les données
echo $twig->render($view, $data);