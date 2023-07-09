<?php

namespace App\Controller;

use App\Entity\PointInteret;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsPointInteretController extends AbstractController
{
    #[Route('/details/{id}', name: 'app_details_point_interet')]
    public function details(PointInteret $pointInteret): Response
    {
        return $this->render('details_point_interet/details.html.twig', [
            'pointInteret' => $pointInteret,
        ]);
    }
}
