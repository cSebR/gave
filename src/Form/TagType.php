<?php

namespace App\Form;

use App\Form\DataTransformer\TagTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType {


    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
	    $this->manager = $manager;
    }

	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder->addModelTransformer(new CollectionToArrayTransformer(),true);
		$builder->addModelTransformer(new TagTransformer($this->manager),true);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefault('attr', [
			'class' => 'tag-input'
		]);
		$resolver->setDefault('required', false);
	}


	public function getParent() {
		return TextType::class;
	}
}