<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class TestController {

    /**
     * @Route("/")
     */
    public function index() {

        return new Response('Test');
    }


}