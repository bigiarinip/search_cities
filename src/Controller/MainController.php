<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\CityRepository;
use App\Entity\City;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function home(CityRepository $cityRepository)
    {
        $cities = $cityRepository->findAll();
        return $this->render('main/searchBar.html.twig', [
            'cities' => $cities]);
    }
}
