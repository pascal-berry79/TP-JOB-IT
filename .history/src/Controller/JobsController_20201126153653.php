<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobsController extends AbstractController
{
    /**
     * @Route("/jobs", name="jobs")
     */
    public function index(): Response
    {
        return $this->render('jobs/index.html.twig', [
            'controller_name' => 'JobsController',
        ]);
    }
}
