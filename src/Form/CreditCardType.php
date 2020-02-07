<?php

namespace App\Form;

use App\Entity\CreditCard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreditCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number',TextType::class,['attr' => ['class' => 'select']])
            ->add('name',TextType::class,['attr' => ['class' => 'select']])
            ->add('expirationMonth',TextType::class,['attr' => ['class' => 'select']])
            ->add('expirationYear',TextType::class,['attr' => ['class' => 'select']])
            ->add('cvv',TextType::class,['attr' => ['class' => 'select']])
	       ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditCard::class,
        ]);
    }
}
