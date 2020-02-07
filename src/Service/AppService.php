<?php

namespace App\Service;

use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Cart;
use App\Entity\Wish;
use App\Repository\CategoryRepository;
use App\Repository\BookRepository;
use App\Repository\UserRepository;
use App\Repository\TagRepository;
use App\Repository\AuthorRepository;
use App\Repository\CartRepository;
use App\Repository\WishRepository;
use Symfony\Component\Security\Core\Security;

class AppService
{
    private $category_repository;
    private $book_repository;
    private $user_repository;
    private $tag_repository;
    private $author_repository;
    private $cart_repository;
    private $wish_repository;
    private $security;

    public function __construct(
        CategoryRepository $category_repository,
        BookRepository $book_repository,
        UserRepository $user_repository,
        TagRepository $tag_repository,
        AuthorRepository $author_repository,
        CartRepository $cart_repository,
        WishRepository $wish_repository,
        Security $security
    ) {
        $this->category_repository = $category_repository;
        $this->book_repository = $book_repository;
        $this->user_repository = $user_repository;
        $this->tag_repository = $tag_repository;
        $this->author_repository = $author_repository;
        $this->cart_repository = $cart_repository;
        $this->wish_repository = $wish_repository;
        $this->security = $security;
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
	   return $this->author_repository->findAll();
    }
    
    public function getCart()
    {
        if (empty($this->security->getUser())) {
            return [];
        }
	   return $this->cart_repository->findBy(['user' => $this->security->getUser()->getId()]);
    }
    
    public function getWish()
    {
        if (empty($this->security->getUser())) {
            return [];
        }
	   return $this->wish_repository->findBy(['user' => $this->security->getUser()->getId()]);
    }
}
