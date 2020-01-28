<?php

namespace App\Service;

use App\Entity\Book;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\BookRepository;
use App\Repository\UserRepository;
use App\Repository\TagRepository;
use App\Repository\AuthorRepository;

class AppService
{
    private $category_repository;
    private $book_repository;
    private $user_repository;
    private $tag_repository;
    private $Author_repository;

    public function __construct(
        CategoryRepository $category_repository,
        BookRepository $book_repository,
        UserRepository $user_repository,
        TagRepository $tag_repository,
        AuthorRepository $Author_repository
    ) {
        $this->category_repository = $category_repository;
        $this->book_repository = $book_repository;
        $this->user_repository = $user_repository;
        $this->tag_repository = $tag_repository;
        $this->Author_repository = $Author_repository;
    }

    public function getCategories()
    {
	   return $this->category_repository->findAll();
    }

    public function getBooks()
    {
       return $this->book_repository->findAll();
    }

// /*     public function getBooksByCategory($category)
//     {
//         /* return $this->book_repository->findBy(array('title' => 'La Mythologie Viking')); */
//         /* return $this->book_repository->findBy(['title' => 'La Mythologie Viking']); */
//         /* return $this->book_repository->findBy(['category_id' => 2]); */
//         /* return $this->book_repository->findBy(['category' => 2]); */
//     } */

     /* public function getBookById($idfBook)
     {
         return $this->book_repository->findBy(['id' => $idfBook]);
     } */

    public function getUsers()
    {
	   return $this->user_repository->findAll();
    }

    public function getTags()
    {
	   return $this->tag_repository->findAll();
    }

    public function getAuthors()
    {
	   return $this->Author_repository->findAll();
    }
}