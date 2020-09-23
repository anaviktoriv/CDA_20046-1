<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/',
                        'message' => 'L\'e-mail n\'est pas au bon format'
                    ])
                ]
            ])
            ->add('plainPassword',  RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9]+$/',
                        'message' => 'Le mot de passe ne doit contenir que des lettre ou des chiffres.'
                    ]),
                    new NotBlank([
                        'message' => 'Choisissez un mot de passe'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le mot passe est trop court(minimum 5 caractères)'
                    ])
                ],
                'invalid_message' => 'Les champs du mot de passe doivent correspondre.',
                'first_options'  => ['label' => false],
                'second_options' => ['label' => false],
            ])
            ->add('customer', CustomerType::class)
            ->add('agreeTerms', CheckboxType::class, [
                'mapped'  => false,
                'constraints' => [
                    new IsTrue([
                        'message'=>'Vous devez accepter nos conditions pour continuer'
                    ])
                ]
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
