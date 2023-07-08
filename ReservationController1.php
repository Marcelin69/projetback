<?php

namespace App\Controller;

use App\Entity\Salle;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\SalleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'reserver')]
    public function index(
        SalleRepository $salle,
        Request $request,
    ): Response
    {


        $reserver=new Reservation;
        $form = $this->createForm(ReservationType::class,$reserver);



        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            dd($request ->get('salle'));
        }














        
        $id= $request ->get('id');
        
        return $this->render('reservation/index.html.twig', [
            'reserveform'=>$form,
            'salle'=>$salle->findOneBy(['id'=>$id]),
            'id'=>$id,
            'controller_name' => 'ReservationController',
        ]);
    }
}
