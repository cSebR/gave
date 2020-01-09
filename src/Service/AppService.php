<?php

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Repository\BookRepository;

class AppService
{
    private $category_repository;
    private $book_repository;

    public function __construct(
        CategoryRepository $category_repository,
        BookRepository $book_repository
    ) {
        $this->category_repository = $category_repository;
        $this->book_repository = $book_repository;
    }

    public function getCategories()
    {
	   return $this->category_repository->findAll();
    }

    public function getBooks()
    {
	   return $this->book_repository->findAll();
    }
}