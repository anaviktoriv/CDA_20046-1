<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[a-zA-Z -]+$/',
                        'message' => 'Nom invalide'
                    ])
                ]
            ])
            ->add('firstName', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[a-zA-Z -]+$/',
                        'message' => 'Nom invalide'
                    ])
                ]
            ])
            ->add('phone', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[+]?[\d]{0,14}$/',
                        'message' => 'Numéro de téléphone invalide'
                    ])
                ]
            ])
            //->add('addresses', AddressType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
