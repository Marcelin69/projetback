<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_registration')]
    public function index(): Response
    {
        $user=new User;
        $form= $this->createForm(RegisterType::class,$user);
        return $this->render('registration/index.html.twig', [
            'formulair' => $form->createView(),
        ]);
    }
}
