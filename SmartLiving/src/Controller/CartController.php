<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cart")
 */
class CartController extends AbstractController
{
    /**
     * @Route("/", name="cart_index")
     */
    public function index(CartService $cartService, SessionInterface $session, ProductRepository $product): Response
    {
        $panier = $session->get('panier',[]);

        $panierWithData = [];

        foreach ($panier as $id => $quantity)
        {
            $panierWithData[] = [
                'product' => $product->find($id),
                'quantity' => $quantity
            ];
        }

        $sum = $cartService->getSum($panierWithData);

        $returnData = ['items' => $panierWithData, 'sum' => $sum] ;

        return $this->render('cart/index.html.twig', $returnData);
    }

    /**
     * @Route("/add/{id}/{quantity}", name="cart_add", methods={"GET"})
     */
    public function add($id, $quantity, CartService $cartService)
    {   
        $cartService->add($id, $quantity);

        return $this->redirectToRoute('cart_index');

    }
    
    /**
     * @Route("/update", name="cart_update", methods={"POST"})
     */
    public function update(CartService $cartService, Request $request)
    {   
        $id = $request->request->get('id');
        $quantity = $request->request->get('quantity_'.$id);
        
        $cartService->update($id, $quantity);

        return $this->redirectToRoute('cart_index');
    }

        /**
     * @Route("/send", name="cart_send")
     */
    public function send(CartService $cartService)
    {   
       
        $cartService->send();

        return $this->redirectToRoute('cart_index');
    }


}
