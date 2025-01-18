<?php

interface IBooksWithCategory 
{
    private function booksWithCategory_query() : QueryBuilder ;
    public function getLeftBarCategories();
}