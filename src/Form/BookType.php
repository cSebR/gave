<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Entity\Format;
use App\Repository\FormatRepository;
use App\Entity\Publisher;
use App\Repository\PublisherRepository;
use App\Entity\Collection;
use App\Repository\CollectionRepository;
use App\Entity\Etat;
use App\Repository\EtatRepository;
use App\Entity\Language;
use App\Repository\LanguageRepository;
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
            ->add('description')
            ->add('numberOfPages')
            ->add('ISBN10')
            ->add('ISBN13')
            ->add('dimention')
            ->add('weight')
            ->add('isAvailable')
            ->add('author',AuthorType::class)
            ->add('category',EntityType::class,[
	            'class' => Category::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(CategoryRepository $pr){
		            return $pr->createQueryBuilder('c');
	            },
	            'choice_label' => 'label'
            ])
            ->add('format',EntityType::class,[
	            'class' => Format::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(FormatRepository $fr){
		            return $fr->createQueryBuilder('f');
	            },
	            'choice_label' => 'label'
            ])
            ->add('publisher',EntityType::class,[
	            'class' => Publisher::class,
	            'attr' => ['class' => 'select'],

	            'query_builder' => function(PublisherRepository $pr){
		            return $pr->createQueryBuilder('p');
	            },
	            'choice_label' => 'label'
            ])
            ->add('collection',EntityType::class,[
	            'class' => Collection::class,
	            'attr' => ['class' => 'select'],

	            'query_builder' => function(CollectionRepository $pr){
		            return $pr->createQueryBuilder('p');
	            },
	            'choice_label' => 'label'
            ])
            ->add('etat',EntityType::class,[
	            'class' => Etat::class,
	            'attr' => ['class' => 'select'],

	            'query_builder' => function(EtatRepository $pr){
		            return $pr->createQueryBuilder('p');
	            },
	            'choice_label' => 'label'
            ])
            
            ->add('language',EntityType::class,[
	            'class' => Language::class,
	            'attr' => ['class' => 'select'],

	            'query_builder' => function(LanguageRepository $pr){
		            return $pr->createQueryBuilder('p');
	            },
	            'choice_label' => 'label'
            ])
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
