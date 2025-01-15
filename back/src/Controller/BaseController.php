<?php

namespace App\Controller;

use ApiPlatform\OpenApi\Model\Response;
use App\Domain\AggregateRoot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


abstract class BaseController extends AbstractController
{
    
    protected function handle(object $command , ) : Response
    {   
        

        return new Response();
    }

}
