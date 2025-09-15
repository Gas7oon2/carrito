<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

Class LoginController extends AbstractController{

        #[Route ( '/login' , name:'app_login' ) ]
    public function login(AuthenticationUtils $authenticationUtils): Response
  {
        // obtener el error de login si existe
        $error = $authenticationUtils->getLastAuthenticationError();
        // último usuario ingresado
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
  }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Symfony se encarga, nunca se ejecuta este método
        throw new \LogicException('Este método puede estar vacío: Symfony lo maneja automáticamente.');
    }

}