<?php //script pour les fonctions du cms

//connexion à la base de données
require_once('include/config.php');
$pdo = connexion();

//fonctions


// déclaration d'une classe Elements
class Elements
{
	// attributs en relation avec la base de données
	public $id;
	public $balise;
	public $content;
	public $class;
	public $src;
	public $alt;
	public $href;
	public $role;
	public $id_css;

	// une méthode qui permet de modifier les attributs de l'objet sur lequel elle est appliquée
	function modifier($content, $balise, $class, $src, $alt, $role, $id_css,$id_article)
	{
		$this->content = $content;
		$this->balise = $balise;
		$this->class = $class;
		$this->src = $src;
		$this->alt = $alt;
		$this->role = $role;
		$this->id_css = $id_css;
		$this->id_article = $id_article;
	}

	// une méthode pour afficher les attributs de l'objet
	function afficher()
	{
		echo '<' . $this->balise . '>' . $this->id . ' ' . $this->balise . ' ' . $this->content . ' ' . $this->class . ' ' . $this->src . ' ' . $this->alt . ' ' . $this->role . ' ' . $this->id_css . ' '.$this->id_article.'(id = ' . $this->id . ')</' . $this->balise . '>';
	}

	function chargePOST()
	{
		// si une valeur a été reçue dans $_POST['balise'] il faut la copier dans l'attribut balise et la filter
		if (isset($_POST['balise'])) {
			$this->balise = $_POST['balise'];
			$this->balise = strip_tags($this->balise);
			$this->balise = htmlspecialchars($this->balise, ENT_QUOTES, 'UTF-8');
		}
		// si une valeur a été reçue dans $_POST['content'] il faut la copier dans l'attribut content et la filter
		if (isset($_POST['content'])) {
			$this->content = $_POST['content'];
			$this->content = strip_tags($this->content);
			$this->content = htmlspecialchars($this->content, ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['class'])) {
			$this->class = $_POST['class'];
			$this->class = strip_tags($this->class);
			$this->class = htmlspecialchars($this->class, ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['src'])) {
			$this->src = $_POST['src'];
			$this->src = strip_tags($this->src);
			$this->src = htmlspecialchars($this->src, ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['alt'])) {
			$this->alt = $_POST['alt'];
			$this->alt = strip_tags($this->alt);
			$this->alt = htmlspecialchars($this->alt, ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['role'])) {
			$this->id_css = $_POST['role'];
			$this->id_css = strip_tags($this->id_css);
			$this->id_css = htmlspecialchars($this->id_css, ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['id_css'])) {
			$this->id_css = $_POST['id_css'];
			$this->id_css = strip_tags($this->id_css);
			$this->id_css = htmlspecialchars($this->id_css, ENT_QUOTES, 'UTF-8');
		}
		if (isset ($_POST['id_article'])) {
			$this->id_article = $_POST['id_article'];
			$this->id_article = strip_tags($this->id_article);
			$this->id_article = htmlspecialchars($this->id_article, ENT_QUOTES, 'UTF-8');
		}
		// si une valeur a été reçue dans $_POST['id'] il faut la copier dans l'attribut id et la convertir en entier
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$this->id = intval($_POST['id']);
		}
	}

	// une méthode pour récupérer un objet depuis une base de données, grâce à son id
	static function readOne($id)
	{
		// définition de la requête SQL avec un paramètre :valeur
		$sql = 'select * from elements where id = :valeur';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on lie le paramètre :valeur à la variable $id reçue
		$query->bindValue(':valeur', $id, PDO::PARAM_INT);

		// exécution de la requête
		$query->execute();

		// récupération de l'unique ligne
		$objet = $query->fetchObject('Elements');

		// retourne l'objet contenant le résultat
		return $objet;
	}

	// une méthode pour récupérer une table dans un tableau d'objets depuis une base de données
	static function readAll()
	{
		// définition de la requête SQL
		$sql = 'select * from elements';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// exécution de la requête
		$query->execute();

		// récupération de toutes les lignes sous forme d'objets
		$tableau = $query->fetchAll(PDO::FETCH_CLASS, 'Elements');

		// retourne le tableau d'objets
		return $tableau;
	}

	// une méthode pour inséré une ligne dans une base de données à partir des attributs de l'objet courant
	function create()
	{
		// construction de la requête :balise, :content sont les valeurs à insérées
		$sql = 'INSERT INTO elements (balise, content, class, src, alt, role, id_css, id_article) VALUES (:balise, :content, :class, :src, :alt, :role, :id_css; :id_article);';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on donne une valeur aux paramètres à partir des attributs de l'objet courant
		$query->bindValue(':id', $this->id, PDO::PARAM_INT);
		$query->bindValue(':balise', $this->balise, PDO::PARAM_STR);
		$query->bindValue(':content', $this->content, PDO::PARAM_STR);
		$query->bindValue(':class', $this->class, PDO::PARAM_STR);
		$query->bindValue(':src', $this->src, PDO::PARAM_STR);
		$query->bindValue(':alt', $this->alt, PDO::PARAM_STR);
		$query->bindValue(':role', $this->role, PDO::PARAM_STR);
		$query->bindValue(':id_css', $this->id_css, PDO::PARAM_STR);
		$query->bindValue(':id_article', $this->id_article, PDO::PARAM_STR);

		// exécution de la requête
		$query->execute();
		var_dump($query);

		// on récupère la clé insérée
		$this->id = $pdo->lastInsertId();
	}

	// une méthode pour mettre à jour une ligne dans une base de données à partir des attributs de l'objet courant
	function update()
	{
		// construction de la requête :balise, :content sont les valeurs à insérées
		$sql = 'UPDATE elements SET balise = :balise , content = :content , class = :class , src = :src , alt = :alt , role = :role , id_css = id_css , id_article = :id_article WHERE id = :id;';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on donne une valeur aux paramètres à partir des attributs de l'objet courant
		$query->bindValue(':id', $this->id, PDO::PARAM_INT);
		$query->bindValue(':balise', $this->balise, PDO::PARAM_STR);
		$query->bindValue(':content', $this->content, PDO::PARAM_STR);
		$query->bindValue(':class', $this->class, PDO::PARAM_STR);
		$query->bindValue(':src', $this->src, PDO::PARAM_STR);
		$query->bindValue(':alt', $this->alt, PDO::PARAM_STR);
		$query->bindValue(':role', $this->role, PDO::PARAM_STR);
		$query->bindValue(':id_css', $this->id_css, PDO::PARAM_STR);
		$query->bindValue(':id_article', $this->id_article, PDO::PARAM_STR);


		// exécution de la requête
		$query->execute();
	}
}


// déclaration d'une classe Elements
class Article
{
	// attributs en relation avec la base de données
	public $id;

	// une méthode qui permet de modifier les attributs de l'objet sur lequel elle est appliquée
	function modifier($titre, $sous_titre, $auteur)
	{
		$this->titre = $titre;
		$this->sous_titre = $sous_titre;
		$this->auteur = $auteur;
	}

	// une méthode pour afficher les attributs de l'objet
	// function afficher()
	// {
	// 	echo '<'.$this->balise.'>' . $this->id . ' ' . $this->balise . ' '. $this->content. ' '. $this->class.' '. $this->src .' ' .$this->alt.' '.$this->role.' '.$this->id_css.'(id = ' . $this->id . ')</'.$this->balise.'>';
	// }

	function chargePOST()
	{
		// si une valeur a été reçue dans $_POST['balise'] il faut la copier dans l'attribut balise et la filter
		if (isset($_POST['titre'])) {
			$this->titre = $_POST['titre'];
			$this->titre = strip_tags($this->titre);
			$this->titre = htmlspecialchars($this->titre, ENT_QUOTES, 'UTF-8');
		}
		// si une valeur a été reçue dans $_POST['content'] il faut la copier dans l'attribut content et la filter
		if (isset($_POST['sous_titre'])) {
			$this->sous_titre = $_POST['sous_titre'];
			$this->sous_titre = strip_tags($this->sous_titre);
			$this->sous_titre = htmlspecialchars($this->sous_titre, ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['auteur'])) {
			$this->auteur = $_POST['auteur'];
			$this->auteur = strip_tags($this->auteur);
			$this->auteur = htmlspecialchars($this->auteur, ENT_QUOTES, 'UTF-8');
		}
		// si une valeur a été reçue dans $_POST['id'] il faut la copier dans l'attribut id et la convertir en entier
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$this->id = intval($_POST['id']);
		}
	}

	// une méthode pour récupérer un objet depuis une base de données, grâce à son id
	static function readOne($id)
	{
		// définition de la requête SQL avec un paramètre :valeur
		$sql = 'select * from article where id = :valeur';

		// préparation de la requête
		$pdo = connexion('article');
		$query = $pdo->prepare($sql);

		// on lie le paramètre :valeur à la variable $id reçue
		$query->bindValue(':valeur', $id, PDO::PARAM_INT);

		// exécution de la requête
		$query->execute();

		// récupération de l'unique ligne
		$objet = $query->fetchObject('Article');

		// retourne l'objet contenant le résultat
		return $objet;
	}

	// une méthode pour récupérer une table dans un tableau d'objets depuis une base de données
	static function readAll()
	{
		// définition de la requête SQL
		$sql = 'select * from article';

		// préparation de la requête
		$pdo = connexion('article');
		$query = $pdo->prepare($sql);

		// exécution de la requête
		$query->execute();

		// récupération de toutes les lignes sous forme d'objets
		$tableau = $query->fetchAll(PDO::FETCH_CLASS, 'Article');

		// retourne le tableau d'objets
		return $tableau;
	}

	// une méthode pour inséré une ligne dans une base de données à partir des attributs de l'objet courant
	function create()
	{
		// construction de la requête :balise, :content sont les valeurs à insérées
		$sql = 'INSERT INTO elements (titre, sous_titre, auteur) VALUES (:titre, :sous_titre, :auteur);';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on donne une valeur aux paramètres à partir des attributs de l'objet courant
		$query->bindValue(':titre', $this->titre, PDO::PARAM_STR);
		$query->bindValue(':sous_titre', $this->sous_titre, PDO::PARAM_STR);
		$query->bindValue(':auteur', $this->auteur, PDO::PARAM_STR);

		// exécution de la requête
		$query->execute();
		var_dump($query);

		// on récupère la clé insérée
		$this->id = $pdo->lastInsertId();
	}

	// une méthode pour mettre à jour une ligne dans une base de données à partir des attributs de l'objet courant
	function update()
	{
		// construction de la requête :balise, :content sont les valeurs à insérées
		$sql = 'UPDATE elements SET titre = :titre , sous_titre = :sou_titre , auteur = :auteur WHERE id = :id;';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on donne une valeur aux paramètres à partir des attributs de l'objet courant
		$query->bindValue(':id', $this->id, PDO::PARAM_INT);
		$query->bindValue(':titre', $this->titre, PDO::PARAM_STR);
		$query->bindValue(':sous_titre', $this->sous_titre, PDO::PARAM_STR);
		$query->bindValue(':auteur', $this->auteur, PDO::PARAM_STR);

		// exécution de la requête
		$query->execute();
	}


	// une méthode pour supprimer la ligne dont la clé est fournie en paramètre
	static function delete($id)
	{
		// Attention ligne à supprimer dans vos codes
		// Empêche la suppression des 3 premières lignes pour conserver mes exemples

		$sql = 'DELETE FROM article WHERE id = :id;';

		// préparation de la requête
		$pdo = connexion('article');
		$query = $pdo->prepare($sql);

		// on lie le paramètre :id à la variable $id reçue
		$query->bindValue(':id', $id, PDO::PARAM_INT);

		// exécution de la requête
		$query->execute();
	}

	// La création des tables se fait normalement via PhpMyAdmin
	// Cette méthode permet avoir des données neuves pour la correction
	// Initialise une base de données avec quelques données test
	// 	static function init() {
	// 		// connexion
	// 		$pdo = connexion('article');

	// 		// suppression des données existantes
	// 		$sql = 'drop table if exists article';
	// 		$query = $pdo->prepare($sql);
	// 		$query->execute();

	// 		// l'attribut auto_increment est différent d'un système à l'autre
	// 		global $config;
	// 		$autoincrement = $config['autoincrement'];

	// 		// création de la table 'users'
	// 		$sql = 'create table article (
	// 				id integer primary key '.$autoincrement.',
	// 				titre varchar(255),
	// 				sous_titre varchar(255)
	// 				auteur varchar(255)
	// 				)';
	// 		$query = $pdo->prepare($sql);
	// 		$query->execute();

	// 		// préparation de la requête d'insertion
	// 		$sql = 'insert into article (titre, sous_titre, auteur) values (:titre,:sous_titre,:auteur)';
	// 		$query = $pdo->prepare($sql);
	// ;

	// 		// insertion des users
	// 		foreach ($users as $user) {
	// 			$query->bindValue(':content', $user['content'], PDO::PARAM_STR);
	// 			$query->bindValue(':balise', $user['balise'], PDO::PARAM_STR);
	// 			$query->execute();
	// 		}
	// 	}
}
