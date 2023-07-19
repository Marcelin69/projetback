<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservController extends AbstractController
{
    #[Route('/reserv/{id}', name: 'reserv')]
    public function index(SalleRepository $sallereserv, Request $request, ReservationRepository $reservation): Response
    {
        
         $id=$request->get('id');
        // $user=$this->getUser();
        $res=$reservation->findBy(['utilisateur'=>$id]);
        return $this->render('reserv/index.html.twig', [
            'controller_name' => 'ReservController',
            'reser'=>$res,
        ]);
    }
}
