<?php

namespace App\Controller;

use App\Entity\Salle;
use App\Service\SalleService;
use App\Repository\SalleRepository;
use App\Repository\LogicielRepository;
use App\Repository\MaterielRepository;
use App\Repository\ErgonomieRepository;
use App\Repository\ReservationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(
        SalleRepository $salle,
        Request $req,
    ): Response {
        $salles = $salle->findAll();
        return $this->render('homepage/index.html.twig', [
            'salles' => $salles,
            'alert'=> $req->get('alert')
        ]);
    }
    #[Route('/salle', name: 'reschercher')]
    public function salle(
        SalleRepository $salle,
        ErgonomieRepository $ergo,
        MaterielRepository $materiel,
        LogicielRepository $log,
    ): Response {
        $salles = $salle->findAll();
        $materiels = $materiel->findAll();
        $logs = $log->findAll();
        $ergos = $ergo->findAll();
        return $this->render('homepage/salle.html.twig', [
            'salles' => $salles,
            'materiels' => $materiels,
            'logs' => $logs,
            'ergos' => $ergos

        ]);
    }
    #[Route('/resulta', name: 'rest', methods: ['GET', 'POST'])]
    public function scho(
        Request $request,
        SalleRepository $salle,
        ErgonomieRepository $ergo,
        MaterielRepository $materiel,
        LogicielRepository $log,
        SalleService $recup
    ): Response {



        $idSalle = $request->get('salle');
        $idMateriel = $request->get('materiel');
        $idLogiciel = $request->get('logiciel');
        $idErgonomie = $request->get('ergonomie');
        // dd($idergonomie);

        return $this->render('homepage/index.html.twig', [


            'salles' =>$recup->getSalleByAssociations($idErgonomie, $idLogiciel, $idMateriel)


            // 'salles'=>$salle->findBy([

            //     'id' => $idsalle,
            //     'ergonomie' => $idergonomie,

            //     'logiciel' => $idlogiciel,
            //     'materiel' => $idmateriel,
            // ]),

        ]);
    }
}
