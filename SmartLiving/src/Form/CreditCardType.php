<?php

namespace App\Form;

use App\Entity\CreditCard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class CreditCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cardOwnerName', TextType::class, [
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[^<>%\/\$]{1,50}$/',
                        'message' => 'Nom invalide'
                    ])
                ]
            ])
            ->add('number', TextType::class, [
                'constraints'=> [
                    new Regex([
                        'pattern' => '/^[\d]{16}$/',
                        'message' => 'Numéro de carte invalide'
                    ])
                ]
            ])
            ->add('expirationDate', DateType::class, [
                'widget'=>'single_text',
                'html5' => false,
                'format'=>'MM/yyyy'
            ])
            ->add('isDefault', CheckboxType::class, [
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditCard::class,
        ]);
    }
}
