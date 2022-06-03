<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findBy([], null, 3);
        return $this->render('home/index.html.twig', [
            "annonces" => $annonces
        ]);
    }
}
