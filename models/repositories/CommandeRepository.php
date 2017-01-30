class CommandeRepository
{

	//Récupère la liste de tous les clients en base de données
	public function getAll($pdo) {

		//Effectuer la requête en bdd pour récupérer l'ensemble des clients enregistrés en bdd
		$resultats = $pdo->query('SELECT p.id, p.civilite, p.nom, p.prenom, p.date_naissance, p.adresse, p.code_postal, p.ville, c.bic, c.iban FROM personne p INNER JOIN client c ON p.id = c.id');

		$resultats->setFetchMode(PDO::FETCH_OBJ);

		//Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
		//et pour chaque enregistrement :
		// 1 -  instancier un objet client
		// 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
		// 3 - pour chaque objet client instanciés et hydratés, les ajouter dans un tableau
		// 4 - retourner ensuite ce tableau avec l'instruction return

		$listeClients = array();

		while($obj = $resultats->fetch()){	

			$client = new Client();
			$client->setId($obj->id);
			$client->setCivilite($obj->civilite);
			$client->setNom($obj->nom);
			$client->setPrenom($obj->prenom);
			$client->setDateNaissance($obj->date_naissance);
			$client->setAdresse($obj->adresse);
			$client->setCp($obj->code_postal);
			$client->setVille($obj->ville);
			$client->setBic($obj->bic);
			$client->setIban($obj->iban);

			$listeClients[] = $client;

		}

		return $listeClients;
	}
}@