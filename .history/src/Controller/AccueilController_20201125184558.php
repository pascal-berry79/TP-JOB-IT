<?php

namespace App\Controller;

use App\Repository\JobsRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(JobsRepository $JobsRepository, EntityManagerInterface $em): Response
    {
        $jobs = $JobsRepository->findBy([], ['id'=>'DESC'], 10);
            return $this->render('accueil/index.html.twig', [
            'jobs' => $jobs,
        ]);
    }
}