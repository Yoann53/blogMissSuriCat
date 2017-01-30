<?php

class Commande
{

	private $id;
	private $ref;
	private $dateCommande;
	private $dateExpedition;
	private $client;
	private $statut;

	public function getId() {
		return $this->id;
	}

	public function setid($id) {
		$this->id = $id;
	}

	public function getReference() {
		return $this->ref;
	}

	public function setReference($ref) {
		$this->ref = $ref;
	}

	public function getDateCommande() {
		return $this->dateCommande;
	}

	public function setDateCommande($dateCommande) {
		$this->dateCommande = $dateCommande;
	}

	public function getDateExpedition() {
		return $this->dateExpedition;
	}

	public function setDateExpedition($dateExpedition) {
		$this->dateExpedition = $dateExpedition;
	}

	public function getClient() {
		return $this->client;
	}

	public function setClient($client) {
		$this->client = $client;
	}

	public function getStatut() {
		return $this->statut;
	}

	public function setStatut($statut) {
		$this->statut = $statut;
	}


}