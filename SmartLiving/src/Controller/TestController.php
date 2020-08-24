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
     * @Route("/", name="app_index")
     */
    public function index() {

        return $this->render('test.html.twig');
    }


    /**
     * @Route("user/add", name="add_user")
     */
    public function add_user(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder) {

        for ($i = 0; $i < 10; $i++){
            $user = new User();
            $user->setEmail('ana' . $i . '@example.com');
            $user->setPassword($passwordEncoder->encodePassword($user, '123456'));
            $user->setRegistrationDate(new \DateTime);
            $em->persist($user);
        }

        $em->flush();

        return new Response('Success');
    }


}