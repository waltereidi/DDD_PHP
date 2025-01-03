<?php declare(strict_types=1);

use App\Domain\Books\Events\CreateNewCategory;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

final class BookTest extends TestCase
{
    public function testBookId(): void
    {
        $createCategory = new CreateNewCategory("TestCase" , null , null );
        $entity = new Category();
        $entity->handle($createCategory);
        $this->assertSame($entity->name, $createCategory->getName());
        
    }
    
}