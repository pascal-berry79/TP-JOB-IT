<?php

namespace App\Controller;

use App\Repository\JobsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    // public function index(): Response
    // {
    //     return $this->render('accueil/index.html.twig', [
    //         'controller_name' => 'AccueilController',
    //     ]);
    // }

    $jobs = $JobsRepository->findBy([], ['id'=>'DESC'], 3);
    // $constructeur = $ConstructeursRepository->findRandomConstructeurs();
    return $this->render('accueil/index.html.twig', [
        'voitures' => $voitures,
}