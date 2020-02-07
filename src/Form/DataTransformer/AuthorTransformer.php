<?php


namespace App\Form\DataTransformer;

use App\Entity\Author;
use App\Entity\Tag;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorTransformer implements DataTransformerInterface {


	private $manager;

	public function __construct(ObjectManager $manager)
	{
		$this->manager = $manager;
	}

	public function transform( $value ) : string {

		return implode(',', $value);
	}

	public function reverseTransform($string): array
	{
		$labels = array_unique(array_filter(array_map('trim', explode(',', $string))));
		$authors = $this->manager->getRepository(Author::class)->findBy([
			'label' => $labels
		]);

		$newLabels = array_diff($labels, $authors);
		foreach ($newLabels as $label) {
			$author = new Author();
			$author->setLabel($label);
			$authors[] = $author;
		}
		return $authors;
	}
}