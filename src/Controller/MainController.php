<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CityRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function home()
    {
        return $this->render('main/searchBar.html.twig');
    }

    /**
     * @Route("/list/{city}", name="list")
     */
    public function findCitiesBySearch(string $city, CityRepository $cityRepository): Response
    {  
        return $this->json([
            'cities' => $cityRepository->__getCities($city)
        ]);
    }
}
