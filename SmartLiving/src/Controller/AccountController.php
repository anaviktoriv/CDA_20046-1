<?php

namespace App\Controller;

use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
        return $this->render('account/myOrders.html.twig', [
            'page_title' => 'Mes Commandes',
        ]);
    }

    /**
     * @Route("/change/password", name="app_change_password")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager){

        $data = [];

        if ($request->isMethod('post')){
            $user = $this->getUser();
            //check the old password and compare it to the same in the db
            $passwordIsValid = $passwordEncoder->isPasswordValid($user, $request->request->get('old-password'));
            $newPassword = $request->request->get('new-password');
            $newPasswordIsConfirmed = $newPassword === $request->request->get('new-password-confirmation');

            if(!$passwordIsValid){
                $data['incorrectPasswordMessage'] = 'Mot de pass incorrecte.';
            }
            if(!$newPasswordIsConfirmed){
                $data['incorrectConfirmationMessage'] = 'Les mots de pases saisis ne correspondent pas';
            }
            if(empty($newPassword)){
                $data['incorrectConfirmationMessage'] = 'Les mots de pases sont vide';
            }

            if($passwordIsValid && $newPasswordIsConfirmed){
                $password = $user->setPassword($passwordEncoder->encodePassword($user, $newPassword));
                $entityManager->persist($password);
                $entityManager->flush();

                return $this->render('helperPages/success.html.twig', [
                    'page_title' => 'Success',
                    'message' => 'Votre mot de pass a été modifié avec le success.',
                    'goTo' => '/account'
                ]);

            }
        }

        return $this->render('account/password.html.twig', $data);
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
                    $response['message'] = 'Votre nom a été modifié avec le succès.';
                    break;

                case 'firstName':
                    $this->getUser()->getCustomer()->setFirstName($validatedValue);
                    $response['message'] = 'Votre prénom a été modifié avec le succès.';
                    break;

                case 'email' :
                    $this->getUser()->setEmail($validatedValue);
                    $response['message'] = 'Votre email a été modifié avec le succès.';
                    break;

                case 'phone' :
                    $this->getUser()->getCustomer()->setPhone($validatedValue);
                    $response['message'] = 'Votre numéro a été modifié avec le succès.';
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
