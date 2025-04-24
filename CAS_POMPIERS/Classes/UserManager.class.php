<?php
class UserManager

/**
 * Classe UserManager
 * 
 * Il s'agit du manager de la classe usermanager.
 * Elle permet de gérer les methodes relatives à la gestion des utilisateurs de l'application.
 */
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	public function add(User $user)
	{
		// Insérer l'utilisateur en laissant la base de données gérer l'attribution de l'identifiant unique
		$q = $this->_db->prepare('INSERT INTO user(nom, prenom, mail, mdp, type) VALUES(:nom, :prenom, :mail, :mdp, :type)');
		$q->bindValue(':nom', $user->getNom());
		$q->bindValue(':prenom', $user->getPrenom());
		$q->bindValue(':mail', $user->getMail());
		$q->bindValue(':mdp', md5($user->getMdp()));
		$q->bindValue(':type', 'utilisateur');
		$q->execute();
	}



	public function getUser($sonMail)
	{
		$q = $this->_db->prepare('SELECT * FROM user WHERE mail = :mail');
		$q->bindValue(':mail', $sonMail);
		$q->execute();
		$userInfo = $q->fetch(PDO::FETCH_ASSOC);
		
		$q->closeCursor();
        //var_dump($typeEngin);
        return  $userInfo;
	}

	public function getIdUser($mail)
	{
		$q = $this->_db->prepare('SELECT id_user FROM user WHERE Mail = :mail');
		$q->execute([':mail' => $mail]);
		$userId = $q->fetchColumn();

		return $userId;
	}


	public function getType($mail)
	{
		try {
			$q = $this->_db->prepare('SELECT type FROM user WHERE mail = :mail');
			$q->bindValue(':mail', $mail, PDO::PARAM_STR);
			$q->execute();
			
			// Récupérer le libellé du grade à partir du résultat de la requête
			$resultat = $q->fetch(PDO::FETCH_ASSOC);
			
			// Vérifier si le résultat est non vide
			if ($resultat) {
				return $resultat['type'];
			} else {
				return "Type introuvable";
			}
		} catch (PDOException $e) {
			// Gérer l'exception (par exemple, en journalisant l'erreur ou en renvoyant un message d'erreur)
			error_log('Erreur PDO lors de la récupération du type d\'utilisateur : ' . $e->getMessage());
			return "Erreur lors de la récupération du type d'utilisateur";
		}
	}


	

	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM user")->fetchColumn();
	}

	

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>