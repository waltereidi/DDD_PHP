<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('api/home')]
class HomeController extends AbstractController
{
    #[Route('/testes', name: 'teste' , methods: ['GET'])]
    public function teste(): Response
    {
        return new Response("");
    }
}
