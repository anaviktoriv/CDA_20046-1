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

    /**
     * @Route("/order/add", name="order_add")
     */
    public function addNewOrder(EntityManagerInterface $em) {
        $order = new Order();
        $order->setDate(new \DateTime())
            ->setDiscount('10.00')
            ->setTotal('445.55')
            ->setStatus('paid');

        $em->persist($order);
        $em->flush();

        return new Response("Success");
    }


    /**
     * @Route("/product/add", name="product_add")
     */
    public function addNewProduct(EntityManagerInterface $em) {
        $product = new Product();
        $product->setTitle('computer')
            ->setDescription('bla bla bla')
            ->setStatus('in_stock')
            ->setPhoto('img.jpg');

        $em->persist($product);
        $em->flush();

        return new Response("Success");
    }
}