<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Customer;
use App\Entity\Status;
use App\Entity\User;
use App\Form\AddressType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {

        if ($this->getUser()) {

            return $this->render('account/account.html.twig', [
                'page_title' => 'Mon Compte',
            ]);

        } else {

            //--------------------------ELSE
            $user = new User();

            $address = new Address();
            $address->setIsDefault(true);

            $form = $this->createForm(UserType::class, $user);
            $addressForm = $this->createForm(AddressType::class, $address);

            $form->handleRequest($request);
            $addressForm->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                /** @var User $user */
                /** @var User $address */
                $user = $form->getData();
                $address = $addressForm->getData();

                $user->setPassword($passwordEncoder->encodePassword(
                    $user,
                    $form['plainPassword']->getData()
                ));

                if (true === $form['agreeTerms']->getData()) {
                    $user->agreeTerms();
                }

                $entityManager = $this->getDoctrine()->getManager();

                $status = $entityManager->getRepository(Status::class)
                    ->findOneBy(['name' => 'particulier']);
                $user->getCustomer()->setStatus($status);
                $user->getCustomer()->addAddress($address);

                $entityManager->persist($user);
                $entityManager->persist($address);

                $entityManager->flush();
                $this->addFlash('success', 'You are now successfully registred!');
                return $this->redirectToRoute('app_index');
            }

            return $this->render('user/new.html.twig', [
                'form' => $form->createView(),
                'addressForm' => $addressForm->createView(),
            ]);

            //-------------------------- ELSE

        }
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }
    }
}