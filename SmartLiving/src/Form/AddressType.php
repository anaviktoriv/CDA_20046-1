<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[^<>%\/\$]{1,100}$/',
                        'message' => 'Adresse invalide'
                    ])
                ]
            ])
            ->add('zipCode', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[^<>%\/\$]{1,10}$/',
                        'message' => 'Code postale invalide'
                    ])
                ]
            ])
            ->add('city', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[^<>%\/\$]{1,50}$/',
                        'message' => 'Ville invalide'
                    ])
                ]
            ])
            ->add('country', TextType::class, [
                'label'=> false,
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[^<>%\/\$]{1,25}$/',
                        'message' => 'Pays invalide'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
