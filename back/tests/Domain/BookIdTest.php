<?php declare(strict_types=1);

use App\Domain\Books\BookId;
use PHPUnit\Framework\TestCase;

final class BookIdTest extends TestCase
{
    
    public function testBookId(): void
    {
        $e = new BookId("1");
        $this->assertNotNull($e , 'BookId could not compile');
    }
    
}
