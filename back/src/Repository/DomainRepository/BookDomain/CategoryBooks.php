<?php 

namespace App\Repository\DomainRepository\BookDomain;

use App\Repository as Repository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\QueryBuilder;
use \Doctrine\ORM\Query\Expr as Expr;
class CategoryBooks
{
        private readonly Repository\CategoryRepository $categoryRepository;
        private readonly Repository\BookCategoryRepository $bookCategoryRepository;

    public function __construct(
        Repository\CategoryRepository $category,
        Repository\BookCategoryRepository $bookCategory, 
    )
    {
        $this->categoryRepository = $category;
        $this->bookCategoryRepository = $bookCategory;
    }
    public function getLeftBarCategories()
    {
        return $this->base_query()
            ->groupBy('cat.id', 'cat.name')
            ->select('cat.name' , 'count(cat.name)')
            ->orderBy('cat.name')
            ->getQuery()
            ->getResult();
    }
    private function base_query():QueryBuilder 
    {
        return $this->categoryRepository
            ->createQueryBuilder('cat')
            ->join(join: 'App\Entity\BookCategory'
            , alias: 'bc' 
            ,conditionType: Expr\Join::WITH 
            ,condition: 'bc.category_id = cat.id')
            ->join('App\Entity\Book', 
                'b' , 
                Expr\Join::WITH , 
                condition: 'b.id = bc.book_id'
            );
    }
}