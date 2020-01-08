<?php

namespace App\Service;

use App\Repository\CategoryRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\Category;

class CategoryService
{

    private $container;

    public function __construct(CategoryRepository $category_repository) {
        $this->container = $category_repository;
    }

    public function getCategories()
    {
	   return $this->container->findAll();
    }
}