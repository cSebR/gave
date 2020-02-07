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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('cover',TextareaType::class,['attr' => ['class' => 'select']])
            ->add('backCover',TextAreaType::class,['attr' => ['class' => 'select']])
            ->add('title',TextType::class,['attr' => ['class' => 'select']])
            ->add('publishedDate',DateTimeType::class,['attr' => ['class' => 'select']])
            ->add('numberOfCopies',TextType::class,['attr' => ['class' => 'select']])
            ->add('priceHT',TextType::class,['attr' => ['class' => 'select']])
            ->add('priceTTC',TextType::class,['attr' => ['class' => 'select']])
            ->add('description',TextAreaType::class,['attr' => ['class' => 'select']])
            ->add('numberOfPages',TextType::class,['attr' => ['class' => 'select']])
            ->add('ISBN10',TextType::class,['attr' => ['class' => 'select']])
            ->add('ISBN13',TextType::class,['attr' => ['class' => 'select']])
            ->add('ASIN',TextType::class,['attr' => ['class' => 'select']])
            ->add('dimention',TextType::class,['attr' => ['class' => 'select']])
            ->add('weight',TextType::class,['attr' => ['class' => 'select']])
            ->add('isAvailable',CheckboxType::class,['attr' => ['class' => 'select']])
            ->add('author',AuthorType::class,['attr' => ['class' => 'select']])
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

	        ->add('tags',TagType::class,['attr' => ['class' => 'select']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
