<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarningController extends AbstractController
{
    #[Route('/warning', name: 'warning')]
    public function index(): Response
    {
        return $this->render('warning/index.html.twig', [
            'controller_name' => 'WarningController',
        ]);
    }
}
