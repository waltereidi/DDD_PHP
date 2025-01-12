<?php declare(strict_types=1);

use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
use PHPUnit\Framework\TestCase;

final class BookTest extends TestCase
{
    
    public function testBookId(): void
    {
        $e = new BookId("1");
        $id = $e->create();

        $bookAggregateRoot = new BookDomain($id);
        
 
    }
    
}