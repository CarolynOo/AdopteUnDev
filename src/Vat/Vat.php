<?php 

namespace App\Vat;

//Mise en place du retour Json avec la methode JsonSerializable
class Vat implements \JsonSerializable
{

	// Tous les attributs en visibilité protected. Ils sont accessibles depuis la même classe ET également depuis les classes qui en héritent.
	protected $country;
	protected $devise;
	protected $prixHt;
	protected $tauxTva;
	protected $prixTtc;

	/**
	 * Création d'un objet 	
	 */
	public function __construct(string $country, float $vat, float $amountFees, float $amount) 
	{
        $this->country = $country;
        $this->vat = $vat;
        $this->amountFees = $amountFees;
        $this->amount = $amount;
    }

    //Retour Json d'un objet 
    public function jsonSerialize() 
    {
        return [
    		'country' => $this->country,
    		'vat' => $this->vat,
    		'amountFees' => $amountFees,
    		'amount' => $amount
        ];
    }

	//Utilisation de la méthode toString() qui retourne la valeur TTC et la devise

	public function toString() 
	{
		return $this->prixTtc .' '. $this->devise;
	}
	 
}
