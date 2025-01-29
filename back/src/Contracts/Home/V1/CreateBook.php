<?php 

namespace App\Contracts\Home\V1;

use App\Entity\Book;
use App\Entity\BookReader;
use App\Entity\UserBookReadingNow;

class CreateBook
{
    /**
     * Refers to users who read this book
     * @var \App\Entity\Category
     */
    public array $categories;
    public Book $book;
    private BookReader $book_reader ; 
    private  UserBookReadingNow $reading_now ;

}
