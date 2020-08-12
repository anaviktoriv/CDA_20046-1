<?php


namespace App\Controller;


use App\Entity\Employee;
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

    /**
     * @Route("/employee/add", name="employee_add")
     */
    public function addNewEmployee(EntityManagerInterface $em) {
        $employee = new Employee();
        $employee->setFirstName('Jane')
            ->setLastName('Doe')
            ->setPhone('+55555555')
            ->setAddress('123 Main St')
            ->setStatus('salesperson');

        $em->persist($employee);
        $em->flush();

        return new Response("Success");
    }


}