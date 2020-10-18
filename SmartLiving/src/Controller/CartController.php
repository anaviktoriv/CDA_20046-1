<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cart")
 */
class CartController extends AbstractController
{
    /**
    * @Route("/", name="cart_index")
    */
    public function index(CartService $cartService): Response
    {
        return $this->render('cart/index.html.twig', [
            'items' => $cartService->cartWithData(), 
            'sum' => $cartService->getSum()
        ]);
    }

    /**
    * @Route("/add", name="cart_add", methods={"POST"})
    */
    public function addPost(Request $request, CartService $cartService) {
        $id = $request->request->get('id');
        $quantity = $request->request->get('quantity');

        $cartService->add($id, $quantity);

        return $this->redirectToRoute('cart_index');
    }
    
    /**
    * @Route("/update", name="cart_update", methods={"POST"})
    */
    public function update(CartService $cartService, Request $request) {
        $id = $request->request->get('id');
        $quantity = $request->request->get('quantity_'.$id);
        
        $cartService->update($id, $quantity);

        return $this->redirectToRoute('cart_index');
    }

    /**
    * @Route("/send", name="cart_send")
    */
    public function send(CartService $cartService) {   
        $cartService->send();

        return $this->redirectToRoute('cart_index');
    }
}