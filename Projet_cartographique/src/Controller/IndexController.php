<?php

namespace App\Controller;

use App\Entity\Criteres;
use App\Entity\PointInteret;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use SplSubject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     *
     * @Route("/index", name="app_index")
     * @Route("/index/{critere}", name="app_index_critere")
     * @Route("/index/{critere}/{ville}", name="app_index_critere_ville")
     */
    public function index(String $critere = null, String $ville = '*'): Response
    {
        $repository = $this->doctrine->getRepository(PointInteret::class);
        $pointsInterets = $repository->getPointsInterets($critere, $ville);

        return $this->render('index/index.html.twig', [
            'pointsInterets' => $pointsInterets
            ]
        );
    }

    /**
     *
     * @Route("/index2", name="app_index2")
     */
  /*  public function index2(Request $request)
    {
        // Get the parameters from DataTable Ajax Call
        if ($request->getMethod() == 'POST')
        {
            $critere = $request->request->get('critere');
            $ville = $request->request->get('ville');
            dump($critere);
            dump($ville);
        }
        else // If the request is not a POST one, die hard
            die;


        $repository = $this->doctrine->getRepository(PointInteret::class);
        $pointsInterets = $repository->getPointsInterets($critere, $ville);

        dump($pointsInterets);
        $returnResponse = new JsonResponse();
        $returnResponse->setJson($pointsInterets);
        return $returnResponse;
    }*/
}
