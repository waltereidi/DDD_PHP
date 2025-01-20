<?php

namespace App\Controller;

use App\ApplicationService\BookService;
use App\Contracts\UI\Pagination;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Contracts\Home\V1 as V1;

#[Route('api/home')]
class HomeController extends BaseController
{
    public function __construct(KernelInterface $kernelInterface)
    {
        $service = new BookService($kernelInterface);
        parent::__construct($service);
    }
    #[Route('/getLeftBarCategories', name: 'getLeftBarCategories' , methods: ['GET'])]
    public function getLeftBarCategories(): Response
    {
        return $this->handle(null , 'getLeftBarCategories');
    }

    #[Route('/getMainPageBooks', name: 'getMainPageBooks' , methods: ['GET'])]
    public function getMainPageBooks(Pagination $pagination): Response
    {
        return $this->handle(null , 'getMainPageBooks');
    }
    
    #[Route('/createBook', name: 'createBook' , methods: ['POST'])]
    public function createBook(V1\CreateBook $request): Response
    {
        return $this->handle( $request, V1\CreateBook::class);
    }

}
