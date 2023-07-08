<?php

namespace App\Controller;

use App\Entity\Salle;
use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(
        SalleRepository $salle
    ): Response
    {
        $salles=$salle->findAll();
        return $this->render('homepage/index.html.twig', [
            'salles'=>$salles,
            'controller_name' => 'HomepageController',
        ]);
    }
}
