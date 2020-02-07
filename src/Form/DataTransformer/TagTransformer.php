<?php


namespace App\Form\DataTransformer;


use App\Entity\Tag;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class TagTransformer implements DataTransformerInterface {

	private $manager;

	public function __construct(EntityManagerInterface $manager)
	{
		$this->manager = $manager;
	}

	public function transform( $value ) : string {

		return implode(',', $value);
	}

	public function reverseTransform($string): array
	{
		$labels = array_unique(array_filter(array_map('trim', explode(',', $string))));
		$tags = $this->manager->getRepository(Tag::class)->findBy([
			'label' => $labels
		]);

		$newLabels = array_diff($labels, $tags);
		foreach ($newLabels as $label) {
			$tag = new Tag();
			$tag->setLabel($label);
			$tags[] = $tag;
		}
		return $tags;
	}
}