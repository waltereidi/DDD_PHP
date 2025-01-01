<?php declare(strict_types=1);

use App\Domain\Books\BookId;
use PHPUnit\Framework\TestCase;

final class BookIdTest extends TestCase
{
    
    public function testBookId(): void
    {
        $e = new BookId("1");
        $id = $e->create();
        $this->assertNotNull($id , 'BookId could not compile');
        $this->assertInstanceOf(BookId::class , $id ,'Inheritance test failed');
    }
    
}