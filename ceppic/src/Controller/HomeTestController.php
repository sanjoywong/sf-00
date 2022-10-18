<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeTestController extends AbstractController
{
    #[Route('/home/test', name: 'app_home_test')]
    public function index(): Response
    {
        return $this->render('home_test/index.html.twig', [
            'controller_name' => 'HomeTestController',
        ]);
    }
}
