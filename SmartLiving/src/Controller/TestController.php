<?php


namespace App\Controller;


use App\Entity\Employee;
use App\Entity\Order;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



//Test controller
class TestController extends AbstractController {

    /**
     * @Route("/", name="app_test")
     */
    public function index() {

        return $this->render('test.html.twig');
    }

}