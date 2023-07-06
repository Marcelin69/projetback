<?php

namespace App\Controller\Admin;

use App\Entity\Salle;
use App\Entity\Logiciel;
use App\Entity\Materiel;
use App\Entity\Ergonomie;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/index.html.twig');
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
        yield MenuItem::linkToCrud('L\'ergonomie', 'fa fa-rome',Ergonomie::class);
        yield MenuItem::linkToCrud('Materiel', 'fa fa-rome',Materiel::class);
        yield MenuItem::linkToCrud('Logiciel', 'fa fa-rome',Logiciel::class);
        yield MenuItem::linkToCrud('Les Reservations', 'fas fa-money-bill-wave',Reservation::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
