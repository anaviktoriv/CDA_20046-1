<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_USER")
 */
/**
 * @Route("/account")
 */
class AccountController extends BaseController
{
    /**
     * @Route("/", name="app_account")
     */
    public function index()
    {
        return $this->render('account/account.html.twig', [
            'page_title' => 'Mon Compte',
        ]);
    }


    /**
     * @Route("/orders", name="app_orders")
     */
    public function getOrders()
    {
        return $this->render('account/account.html.twig', [
            'page_title' => 'Mes Commandes',
        ]);
    }

    /**
     * @Route("/change/{propery}/{value}", name="app_cange_detail")
     */
    public function changeAccountDetail($propery, $value, EntityManagerInterface $entityManager){
        $validatedValue = $this->validateInsertionIntoDataBase($propery, $value);

        if($validatedValue){
            $response = [
                'success' => true,
            ];
            //Switch on property to know which property to set
            switch ($propery){
                case 'lastName':
                    $this->getUser()->getCustomer()->setLastName($validatedValue);
                    $response['message'] = 'Votre nom a été changé avec le succès.';
                    break;

                case 'firstName':
                    $this->getUser()->getCustomer()->setFirstName($validatedValue);
                    break;

                case 'email' :
                    $this->getUser()->setEmail($validatedValue);
                    break;

                case 'phone' :
                    $this->getUser()->getCustomer()->setPhone($validatedValue);
                    break;

                default :
                    return $this->json([
                        'success' => false,
                        'validationError' => false,
                        'message' => 'Une erreur est survenu.'
                    ]);
            }

            $entityManager->persist($this->getUser());
            $entityManager->flush();
            return $this->json($response);

        } else {

            $response = [
                'success' => false,
                'validationError' => true,
                'message' => 'Entrer une valeur valide'
            ];
            return $this->json($response);
        }

    }
}
