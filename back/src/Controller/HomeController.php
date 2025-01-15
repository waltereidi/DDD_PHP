<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('api/home')]
class HomeController extends BaseController
{
    #[Route('/testes', name: 'teste' , methods: ['GET'])]
    public function teste(KernelInterface $kernelInterface ): Response
    {
        return new Response("");
    }


}
