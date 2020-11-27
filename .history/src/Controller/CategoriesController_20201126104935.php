<?php

namespace App\Controller;

use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $repository=$em->getRepository(Constructeurs::class);
        $categories = $repository -> findAll();

        return $this->render('constructeurs/index.html.twig', [
            'constructeurs' => $constructeurs,
        ]);
    }
}
