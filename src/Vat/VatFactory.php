<?php

namespace App\Vat;

use App\Vat\Vat;

class VatFactory
{

	protected $countryNames;
	protected $vatConfigs;

	public function __construct(array $countryNames, array $vatConfigs) 
	{
		$this->countryNames = $countryNames;
		
		$this->vatConfigs = $vatConfigs;
	}

	public function create(int $country, float $price)
	{
		// récuperer le nom du pays selon son id pays

		// récuperer la valeur de la tva selon son id pays

		// calcul de la valeur TTC

		// retourne l'object VAT avec en paramètre le nom du pays, la valeur de la TVA la valeur HT, la valeur TTC

		return new Vat('Italia');
	}
}