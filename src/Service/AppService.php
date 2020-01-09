<?php

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Repository\BookRepository;
use App\Repository\UserRepository;
use App\Repository\TagRepository;

class AppService
{
    private $category_repository;
    private $book_repository;
    private $user_repository;
    private $tag_repository;

    public function __construct(
        CategoryRepository $category_repository,
        BookRepository $book_repository,
        UserRepository $user_repository,
        TagRepository $tag_repository
    ) {
        $this->category_repository = $category_repository;
        $this->book_repository = $book_repository;
        $this->user_repository = $user_repository;
        $this->tag_repository = $tag_repository;
    }

    public function getCategories()
    {
	   return $this->category_repository->findAll();
    }

    public function getBooks()
    {
	   return $this->book_repository->findAll();
    }

    public function getUsers()
    {
	   return $this->user_repository->findAll();
    }

    public function getTags()
    {
	   return $this->tag_repository->findAll();
    }
}