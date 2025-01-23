<?php 

namespace App\Contracts\Home\V1;

use App\Entity\Book;

class CreateBook
{
    /**
     * Refers to users who read this book
     * @var \App\Entity\Category
     */
    public array $categories;
    public Book $book;
    /**
     * Refers to users who read this book
     * @var \App\Entity\BookReader
     */
    private array  $book_reader ; 
    /**
     * Refers to users who read this book
     * @var \App\Entity\UserBookReadingNow
     */
    private array $reading_now ;

}
