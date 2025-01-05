<?php declare(strict_types=1);

use App\Domain\Books\Book;
use App\Domain\Books\Events\CreateNewCategory;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

final class CategoryTest extends TestCase
{

    public function testBookId(): void
    {

        $createCategory = new CreateNewCategory("TestCase" , null , null );
        $entity = new Category;
        $entity->handle($createCategory);
        $this->assertSame($entity->getName(), $createCategory->getName());
        
    }
    
}
