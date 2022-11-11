<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/annonce/read/one/{slug}', name: 'annonce_read_one_by_slug')]
    public function readOneBySlug($slug, AnnonceRepository $annonceRepository): Response
    {
        $annonce = $annonceRepository->findOneBySlug($slug);
        return $this->render('annonce/readOne.html.twig', [
            "annonce" => $annonce
        ]);
    }


    #[Route('/annonce/create', name: 'annonce_create')]
    public function create(Request $request, ObjectManager $manager)
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

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

        }
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
