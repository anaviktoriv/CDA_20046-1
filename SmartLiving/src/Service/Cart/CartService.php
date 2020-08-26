<?php

namespace App\Service\Cart;

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

    public function add(int $id,int $quantity)
    {
        $panier = $this->session->get('panier', []);

        $panier[$id] = isset($panier[$id]) ? $panier[$id] + $quantity : $quantity ; 
        
        $this->session->set('panier', $panier);
    }

    public function update(int $id, int $quantity)
    {
        $panier = $this->session->get('panier',[]);

        if (isset($panier[$id]))
        {
            if ($quantity > 0 ){
                $panier[$id] = $quantity;
            } else {
                unset($panier[$id]);
            }
        }
        
        $this->session->set('panier', $panier);
    }

    public function send()
    {
        $cart = $this->session->get('panier',[]);
        $entityManager = $this -> EntityManager ;


        $product = new Order();
        $product -> setDate(new \DateTime());
        $product -> setDiscount(10);
        $product -> setTotal(12);
        $product -> setStatus("cart");

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

    public function getSum($cartWithData): float
    {
        $sum = 0;

        foreach($cartWithData as $item) {
            $sum += $item['product']->getUnitPrice() * $item['quantity'];
        }

        return $sum;
    }

}