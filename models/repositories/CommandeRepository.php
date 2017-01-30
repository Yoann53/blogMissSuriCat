<?php

class CommandeRepository
{

	//Récupère la liste de tous les clients en base de données
	public function getAll($pdo) {

		//Effectuer la requête en bdd pour récupérer l'ensemble des clients enregistrés en bdd
		$resultats = $pdo->query('SELECT p.civilite, p.nom, p.prenom, com.id, com.ref, com.date_expedition, com.date_cmd, s.libelle FROM commande com INNER JOIN client c ON com.client_id = c.id INNER JOIN personne p ON p.id = c.id INNER JOIN statut s ON com.statut_id = s.id');

		$resultats->setFetchMode(PDO::FETCH_OBJ);

		//Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
		//et pour chaque enregistrement :
		// 1 -  instancier un objet client
		// 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
		// 3 - pour chaque objet client instanciés et hydratés, les ajouter dans un tableau
		// 4 - retourner ensuite ce tableau avec l'instruction return

		$listeCommandes = array();

		while($obj = $resultats->fetch()){	

			$client = new Client();
			$client->setCivilite($obj->civilite);
			$client->setNom($obj->nom);
			$client->setPrenom($obj->prenom);

			$statut = new Statut();
			$statut->setLibelle($obj->libelle);

			$commande = new Commande();
			$commande->setId($obj->id);
			$commande->setClient($client);
			$commande->setStatut($statut);
			$commande->setReference($obj->ref);
			$commande->setDateExpedition($obj->date_expedition);
			$commande->setDateCommande($obj->date_cmd);

			$listeCommandes[] = $commande;

		}

		return $listeCommandes;
	}
}