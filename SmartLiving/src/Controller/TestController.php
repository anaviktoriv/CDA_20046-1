<?php


namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


//Test controller
class TestController extends AbstractController {

    /**
<<<<<<< Updated upstream
=======
     * @Route("/", name="app_index")
     */
    public function index() {

        return $this->render('product/index.html.twig');
    }


    /**
>>>>>>> Stashed changes
     * @Route("/success", name="app_success")
     */
    public function success() {

        return $this->render('helperPages/success.html.twig', [
            'page_title' => 'Success',
            'message' => 'Votre mot de pass a été modifié avec le success.',
            'goTo' => '/account'
        ]);
    }

}