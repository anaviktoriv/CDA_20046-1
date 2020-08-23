<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    //override parent method to have a return type User in all our controllers and not UserInterface
    protected function getUser(): User{
        return parent::getUser();
    }
}