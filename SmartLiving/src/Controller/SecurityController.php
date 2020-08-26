<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        //TODO: check if user is authenticated and redirect them

        if ($this->getUser()) {

                return $this->render('account/account.html.twig', [
                    'page_title' => 'Mon Compte',
                ]);

        } else {
            //get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();

            //last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('security/login.html.twig', [
                'last_username' => $lastUsername,
                'error'         => $error,
            ]);

        }


    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        //this method is intercepted by the authenticator thanks to the lines of code in security.yaml logout: path: app_logout
    }


}
