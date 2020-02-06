<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cover')
            ->add('backCover')
            ->add('title')
            ->add('publishedDate')
            ->add('numberOfCopies')
            ->add('priceHT')
            ->add('priceTTC')
            // ->add('discountAmount')
            // ->add('discountType')
            ->add('description')
            ->add('numberOfPages')
            // ->add('ranking')
            ->add('ISBN10')
            ->add('ISBN13')
            ->add('ASIN')
            ->add('dimention')
            ->add('weight')
            ->add('isAvailable')
            // ->add('createdAt')
            ->add('author',AuthorType::class)
            // ->add('category')
            // ->add('format')
            // ->add('publisher')
            // ->add('collection')
            // ->add('etat')
            // ->add('language')
	        ->add('tags',TagType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
