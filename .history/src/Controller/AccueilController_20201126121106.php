<?php

namespace App\Controller;

use App\Repository\JobsRepository;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(JobsRepository $JobsRepository, CategoriesRepository $CategoriesRepository, EntityManagerInterface $em): Response
    {
        
        // Requête des job
        $jobs = $JobsRepository->findBy([], ['id'=>'DESC'], 10);

        // Requête des Catégories
        $categories = $CategoriesRepository->findAll();
        $tableau = array();
        foreach($jobs as $job){

            // Si il n'est pas dans le tableau, recupérer le nom de la catégorie recherchée
            if(!in_array($job->getCategory()->getNom(),$tableau)){
                $tableau[]=$job->getCategory()->getNom();
            }
        }
        return $this->render('accueil/index.html.twig', [
            'jobs' => $jobs,
        ]);
    }
}