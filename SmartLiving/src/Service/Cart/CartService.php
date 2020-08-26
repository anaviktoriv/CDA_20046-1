<?php

namespace App\Service\Cart;

use App\Entity\Customer;
use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {

    protected $session;

    public function __construct(SessionInterface $session, EntityManagerInterface $em)
    {
        $this->session = $session;
        $this->EntityManager = $em;
    }

    //Methods for add product in cart
    public function add(int $id,int $quantity)
    {
        $panier = $this->session->get('panier', []);
        $entityManager = $this -> EntityManager ;
        $item = $entityManager -> getRepository(Product::class) -> findById($id);

        if (!empty($item)) {
            $panier[$id] = isset($panier[$id]) ? $panier[$id] + $quantity : $quantity ; 
        }

        $this->session->set('panier', $panier);
    }

    //Methods for delete or update product and quantity in cart
    public function update(int $id, int $quantity)
    {
        $panier = $this->session->get('panier',[]);

        if (isset($panier[$id])) {
            if ($quantity > 0 ) {
                $panier[$id] = $quantity;
            } else {
                unset($panier[$id]);
            }
        }
        
        $this->session->set('panier', $panier);
    }

    //Method for send data cart in DB.
    public function send()
    {
        $cart = $this->session->get('panier',[]);
        $entityManager = $this -> EntityManager;


        $product = new Order();
        $product -> setDate(new \DateTime());
        $product -> setDiscount(0); 
        $product -> setTotal($this->getSum());
        $product -> setStatus("cart");

        $userId = $entityManager -> getRepository(Customer::class) -> findById(1); //A définir
        $product -> setCustomer($userId[0]);

        foreach ($cart as $item => $quantity) {
            $orderDetail = new OrderDetails($item);

            $items = $entityManager -> getRepository(Product::class) -> findById($item);
        
            $orderDetail->setUnitPrice($items[0]->getUnitPrice());
            $orderDetail->setQuantity($quantity);
            $orderDetail->setProduct($items[0]);

            $product -> addOrderDetail($orderDetail);
        }

        $entityManager->persist($product);
        $entityManager->flush();

        $this->session->set('panier', []);
    }

    //Cart with data product
    public function cartWithData()
    {
        $cart = $this->session->get('panier',[]);

        $cartWithData = [];

        foreach ($cart as $id => $quantity)
        {
            $cartWithData[] = [
                'product' => $this -> EntityManager-> getRepository(Product::class) -> find($id),
                'quantity' => $quantity
            ];
        }

        return $cartWithData;
    }

    //Sum cart
    public function getSum(): float
    {
        $cartWithData = $this->cartWithData();
        $sum = 0;

        //dd($cartWithData);
        foreach($cartWithData as $item) {
            $sum += $item['product']->getUnitPrice() * $item['quantity'];
        }

        return $sum;
    }

}