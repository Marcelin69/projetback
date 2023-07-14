<?php

namespace App\Controller\Admin;

use App\Entity\Salle;
use App\Entity\Logiciel;
use App\Entity\Materiel;
use App\Entity\Ergonomie;
use App\Entity\Reservation;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    protected $user;
    protected $reservation;
    private $em;
    /**/
    public function __construct(\Doctrine\ORM\EntityManagerInterface $em){
        $this->em = $em ;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/index.html.twig',[
            "salles" => count($this->em->getRepository(Salle::class)->findAll()),
            // "materiels"=>count ($this->em->getRepository(Materiel::class
            // )->findBy(["disponible"=>true])),
            "accepter"=>count ($this->em->getRepository(Reservation::class)->findBy(["reserve"=>true])),
            "utilisateurs"=>$this->em->getRepository(User::class)->findAll(),
            "reservations"=>count($this->em->getRepository(Reservation::class)->findAll()),
            "reservation"=>$this->em->getRepository(Reservation::class)->findAll(),



        ]);
    }
     public function configureAssets(): Assets
     {
        return parent::configureAssets()->addCssFile("css/daschbord.css");
     }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projetback');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Les Salles', 'fa fa-city',Salle::class);
        yield MenuItem::linkToCrud('L\'ergonomie', 'far fa-chaire-office',Ergonomie::class);
        yield MenuItem::linkToCrud('Materiel', 'fa fa-rome',Materiel::class);
        yield MenuItem::linkToCrud('Logiciel', 'fa fa-rome',Logiciel::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user',User::class);
        yield MenuItem::linkToCrud('Les Reservations', 'fas fa-money-bill-wave',Reservation::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
