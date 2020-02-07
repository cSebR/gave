<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ligne1',TextType::class,['attr' => ['class' => 'select']])
            ->add('ligne2',TextType::class,['attr' => ['class' => 'select']])
            ->add('ligne3',TextType::class,['attr' => ['class' => 'select']])
            ->add('PostalCode',TextType::class,['attr' => ['class' => 'select']])
            ->add('city',TextType::class,['attr' => ['class' => 'select']])
            //->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
