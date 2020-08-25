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




    protected function validateInsertionIntoDataBase($fieldName, $valueToValidate){

        //SET REGEX
        //Any character except for <>%\$
        $allASCIILettersAndNumbersRegex = '/^[^<>%\/\$]{1,50}$/';
        $phoneRegex = '/^[+]?[\d()-]{0,14}$/';
        $emailRegex = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

        //sanitize string
        $sanitizedValue = filter_var($valueToValidate, FILTER_SANITIZE_STRING);

        $valueIsValid =false;

        switch ($fieldName){
            case 'lastName':
            case 'firstName':
                $valueIsValid = preg_match($allASCIILettersAndNumbersRegex, $sanitizedValue);
                break;

            case 'phone' :
                $valueIsValid = preg_match($phoneRegex, $sanitizedValue);
                break;

            case 'email' :
                $valueIsValid = preg_match($emailRegex, $sanitizedValue);
                break;
            default : return false;
        }

        if ($valueIsValid){
            return $sanitizedValue;
        }else {
            return false;
        }
    }



}