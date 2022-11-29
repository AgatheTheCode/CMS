<?php //script pour les fonctions du cms

//connexion à la base de données
require_once('include/config.php');
$pdo = connexion();

//fonctions


// déclaration d'une classe Auteur
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
	function modifier($prenom, $nom) {
		$this->prenom = $prenom;
		$this->nom = $nom;
	}

	// une méthode pour afficher les attributs de l'objet
	function afficher()
	{
		echo '<'.$this->balise.'>' . $this->id . ' ' . $this->balise . ' '. $this->content. ' '. $this->class.' '. $this->src .' ' .$this->alt.' '. $this->href.' '.$this->role.' '.$this->id_css.'(id = ' . $this->id . ')</'.$this->balise.'>';
	}

	function chargePOST() {
		// si une valeur a été reçue dans $_POST['nom'] il faut la copier dans l'attribut nom et la filter
		if (isset($_POST['balise'])) {
			$this->nom = $_POST['balise'];
			$this->nom = strip_tags($this->nom);
			$this->nom = htmlspecialchars($this->nom, ENT_QUOTES, 'UTF-8');
		}
		// si une valeur a été reçue dans $_POST['prenom'] il faut la copier dans l'attribut prenom et la filter
		if (isset($_POST['content'])) {
			$this->prenom = $_POST['content'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
        if (isset($_POST['class'])) {
			$this->prenom = $_POST['class'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
        if (isset($_POST['src'])) {
			$this->prenom = $_POST['src'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
        if (isset($_POST['alt'])) {
			$this->prenom = $_POST['alt'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
        if (isset($_POST['href'])) {
			$this->prenom = $_POST['href'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
        if (isset($_POST['role'])) {
			$this->prenom = $_POST['role'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
        if (isset($_POST['id_css'])) {
			$this->prenom = $_POST['id_css'];
			$this->prenom = strip_tags($this->prenom);
			$this->prenom = htmlspecialchars($this->prenom, ENT_QUOTES, 'UTF-8');
		}
		// si une valeur a été reçue dans $_POST['id'] il faut la copier dans l'attribut id et la convertir en entier
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$this->id = intval($_POST['id']);
		}
	}

	// une méthode pour récupérer un objet depuis une base de données, grâce à son id
	static function readOne($id) {
		// définition de la requête SQL avec un paramètre :valeur
		$sql= 'select * from elements where id = :valeur';

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
	static function readAll() {
		// définition de la requête SQL
		$sql= 'select * from elements';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// exécution de la requête
		$query->execute();

		// récupération de toutes les lignes sous forme d'objets
		$tableau = $query->fetchAll(PDO::FETCH_CLASS,'Elements');

		// retourne le tableau d'objets
		return $tableau;
	}

	// une méthode pour inséré une ligne dans une base de données à partir des attributs de l'objet courant
	function create() {
		// construction de la requête :nom, :prenom sont les valeurs à insérées
		$sql = 'INSERT INTO elements (balise, content, class, src, alt, href, role, id_css) VALUES (:balise, :content, :class, :src, :alt, :href, :role, :id_css);';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on donne une valeur aux paramètres à partir des attributs de l'objet courant
		$query->bindValue(':balise', $this->balise, PDO::PARAM_STR);
		$query->bindValue(':content', $this->content, PDO::PARAM_STR);
        $query->bindValue(':class', $this->class, PDO::PARAM_STR);
        $query->bindValue(':src', $this->src, PDO::PARAM_STR);
        $query->bindValue(':alt', $this->alt, PDO::PARAM_STR);
        $query->bindValue(':href', $this->href, PDO::PARAM_STR);
        $query->bindValue(':role', $this->role, PDO::PARAM_STR);
        $query->bindValue(':id_css', $this->id_css, PDO::PARAM_STR);

		// exécution de la requête
		$query->execute();

		// on récupère la clé de l'auteur inséré
		$this->id = $pdo->lastInsertId();
	}

	// une méthode pour mettre à jour une ligne dans une base de données à partir des attributs de l'objet courant
	function update() {
		// construction de la requête :nom, :prenom sont les valeurs à insérées
		$sql = 'UPDATE elements SET nom = :nom , prenom = :prenom WHERE id = :id;';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on donne une valeur aux paramètres à partir des attributs de l'objet courant
		$query->bindValue(':id', $this->id, PDO::PARAM_INT);
		$query->bindValue(':nom', $this->nom, PDO::PARAM_STR);
		$query->bindValue(':prenom', $this->prenom, PDO::PARAM_STR);

		// exécution de la requête
		$query->execute();
	}


	// une méthode pour supprimer la ligne dont la clé est fournie en paramètre
	static function delete($id) {
		// Attention ligne à supprimer dans vos codes
		// Empêche la suppression des 3 premières lignes pour conserver mes exemples
		if ($id < 4) return;

		$sql = 'DELETE FROM elements WHERE id = :id;';

		// préparation de la requête
		$pdo = connexion('elements');
		$query = $pdo->prepare($sql);

		// on lie le paramètre :id à la variable $id reçue
		$query->bindValue(':id', $id, PDO::PARAM_INT);

		// exécution de la requête
		$query->execute();
	}

	// La création des tables se fait normalement via PhpMyAdmin
	// Cette méthode permet avoir des données neuves pour la correction
	// Initialise une base de données avec quelques données test
	static function init() {
		// connexion
		$pdo = connexion('elements');

		// suppression des données existantes
		$sql = 'drop table if exists elements';
		$query = $pdo->prepare($sql);
		$query->execute();

		// l'attribut auto_increment est différent d'un système à l'autre
		global $config;
		$autoincrement = $config['autoincrement'];

		// création de la table 'users'
		$sql = 'create table elements (
				id integer primary key '.$autoincrement.',
				nom varchar(50),
				prenom varchar(50))';
		$query = $pdo->prepare($sql);
		$query->execute();

		// préparation de la requête d'insertion
		$sql = 'insert into elements (prenom, nom)
 			values (:prenom,:nom)';
		$query = $pdo->prepare($sql);

		// données à créer
		$users = [
			['prenom' => 'Victor', 'nom' => 'Hugo'],
			['prenom' => 'Georges', 'nom' => 'Sand'],
			['prenom' => 'Emile', 'nom' => 'Zola']
		];

		// insertion des users
		foreach ($users as $user) {
			$query->bindValue(':prenom', $user['prenom'], PDO::PARAM_STR);
			$query->bindValue(':nom', $user['nom'], PDO::PARAM_STR);
			$query->execute();
		}
	}
}