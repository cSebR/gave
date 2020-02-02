<?php

namespace App\Form;


use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Collection;
use App\Entity\Etat;
use App\Entity\Format;
use App\Entity\Language;
use App\Entity\Publisher;
use App\Entity\Tag;
use App\Repository\CategoryRepository;
use App\Repository\CollectionRepository;
use App\Repository\EtatRepository;
use App\Repository\FormatRepository;
use App\Repository\LanguageRepository;
use App\Repository\PublisherRepository;
use App\Repository\TagRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('publishedDate',DateTimeType::class, [
	            'date_label' => 'Starts On'
            ])
            ->add('numberOfCopies')
            ->add('priceHT')
            ->add('priceTTC')
            //->add('discountAmount')
            //->add('discountType')
            ->add('description',TextareaType::class, [
	            'attr' => ['class' => 'select'],
            ])
            ->add('numberOfPages')
            //->add('ranking')
            ->add('ISBN10')
            ->add('ISBN13')
            ->add('ASIN')
            ->add('dimention')
            ->add('weight')
            //->add('createdAt')
            /*->add('author',EntityType::class,[
	            'class' => Author::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(AuthorRepository $pr){
		            return $pr->createQueryBuilder('a');
	            },
	            'choice_label' => 'label'
            ])*/
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
		            return $pr->createQueryBuilder('co');
	            },
	            'choice_label' => 'label'
            ])
            ->add('etat',EntityType::class,[
	            'class' => Etat::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(EtatRepository $pr){
		            return $pr->createQueryBuilder('e');
	            },
	            'choice_label' => 'label'
            ])
            ->add('language',EntityType::class,[
	            'class' => Language::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(LanguageRepository $pr){
		            return $pr->createQueryBuilder('l');
	            },
	            'choice_label' => 'label'
			])
            ->add('isAvailable')

            /*->add('tags',EntityType::class,[
	            'class' => Tag::class,
	            'attr' => ['class' => 'select'],
	            'query_builder' => function(TagRepository $pr){
		            return $pr->createQueryBuilder('t');
	            },
	            'choice_label' => 'label'
            ])*/
        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
