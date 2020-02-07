<?php

namespace App\Form;

use App\Entity\Cart;
use App\Entity\Book;
use App\Repository\BookRepository;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('book',EntityType::class,[
	            'class' => Book::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(BookRepository $pr){
		            return $pr->createQueryBuilder('c');
	            },
	            'choice_label' => 'title'
            ])
            ->add('user',EntityType::class,[
	            'class' => User::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(UserRepository $pr){
		            return $pr->createQueryBuilder('c');
	            },
	            'choice_label' => 'firstname'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cart::class,
        ]);
    }
}
