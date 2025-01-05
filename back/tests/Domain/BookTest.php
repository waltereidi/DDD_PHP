<?php declare(strict_types=1);

use App\Domain\Books\Book;
use App\Domain\Books\BookId;
use PHPUnit\Framework\TestCase;

final class BookTest extends TestCase
{
    
    public function testBookId(): void
    {
        $e = new BookId("1");
        $id = $e->create();

        $bookAggregateRoot = new Book($id);
        $bookAggregateRoot->testeEvent();
 
    }
    
}