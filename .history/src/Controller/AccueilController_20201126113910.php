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
        
        $jobs = $JobsRepository->findBy([], ['id'=>'DESC'], 10);
            return $this->render('accueil/index.html.twig', [
            'jobs' => $jobs,
        ]);

        $categories = $CategoriesRepository->findAll();
        $arraycat = array();
        foreach($jobs as $job){
            // Si pas dans le tableau, recupérer le nom de la catégorie recherchée
            if(!in_array($job->getCategory()->getNom(),$arraycat)){
                $arraycat[]=$job->getCategory()->getNom();
            }
        }
    }
}