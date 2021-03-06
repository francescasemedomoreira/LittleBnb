<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'annonce')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findAll();
        return $this->render('annonce/index.html.twig', [
            "annonces" => $annonces
        ]);
    }

    #[Route('/annonce/create', name: 'annonce_create')]
    public function create()
    {
        $annonce = new Annonce();
        $form = $this->createFormBuilder($annonce)
            ->add(child: 'titre')
            ->add(child: 'introduction')
            ->add(child: 'description')
            ->add(child: 'chambres')
            ->add(child: 'prix')
            ->add(child: 'imageCouverture')

            ->getForm();
        return $this->render('annonce/create.html.twig', [
            'form'=>$form->createView()]);
    }

    #[Route('/annonce/read', name: 'annonce_read')]
    public function read()
    {
        return $this->render('annonce/read.html.twig');
    }

    #[Route('/annonce/update', name: 'annonce_update')]
    public function update()
    {
        return $this->render('annonce/update.html.twig');
    }

    #[Route('/annonce/delete', name: 'annonce_delete')]
    public function delete()
    {
        return $this->render('annonce/delete.html.twig');
    }
}
