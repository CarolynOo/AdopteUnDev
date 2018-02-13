<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Vat\Vat;
use App\Vat\VatFactory;


class ApiTvaController extends Controller
{
    /**
     * @Route("/apitva/{country}/{price}", name="api_tva", requirements={"country"="\d+"}), methods={"GET"})
     */
    public function index(int $country, float $price)
    {
        $factory = new VatFactory();
        
        $amount = $factory->create($country, $price);

        return new JsonResponse($amount);
    }
}
