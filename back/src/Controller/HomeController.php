<?php

namespace App\Controller;

use App\ApplicationService\BookService;

use App\Contracts\UI\Pagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Controller\Contracts\Home\V1 as V1;
use Symfony\Component\Serializer\SerializerInterface;

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

    #[Route('/getMainPageBooks', name: 'getMainPageBooks' , methods: ['POST'])]
    public function getMainPageBooks( #[MapRequestPayload]  Pagination $pagination ): Response
    {
        //return $this->handle(null , 'getMainPageBooks');
        return new Response($pagination->getMaxResults());
    }
    
    #[Route('/createBook', name: 'createBook' , methods: ['POST'])]
    public function createBook(Request $request, SerializerInterface $serializer): Response
    {
        $createBook = $serializer->deserialize($request->getContent(), V1\UserAddedBook::class, 'json');

        return $this->handle( $request, V1\UserAddedBook::class);
    }

}
