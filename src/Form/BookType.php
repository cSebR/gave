<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Format;
use App\Entity\Publisher;
use App\Repository\FormatRepository;
use App\Repository\PublisherRepository;
use App\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            //->add('discountAmount')
            //->add('discountType')
            ->add('description')
            ->add('numberOfPages')
            //->add('ranking')
            ->add('ISBN10')
            ->add('ISBN13')
            ->add('ASIN')
            ->add('dimention')
            ->add('weight')
            //->add('isAvailable')
            //->add('createdAt')
            //->add('authorId')
            ->add('format',EntityType::class,[
            	'class' => Format::class,
	            'query_builder' => function(FormatRepository $fr){
            	return $fr->createQueryBuilder('f');
	            },
	            'choice_label' => 'label'
                ])
            ->add('publisher',EntityType::class,[
	            'class' => Publisher::class,
	            'query_builder' => function(PublisherRepository $pr){
		            return $pr->createQueryBuilder('f');
	            },
	            'choice_label' => 'label'
                ])
            //->add('theme')
            ->add('category',EntityType::class,[
	            'class' => Category::class,
	            'query_builder' => function(CategoryRepository $pr){
		            return $pr->createQueryBuilder('f');
	            },
	            'choice_label' => 'label'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
