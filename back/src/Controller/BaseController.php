<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\ApplicationService\ApplicationServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


abstract class BaseController extends AbstractController
{
    
    protected function handle(object $command , ApplicationServiceInterface $asi ) : Response
    {   
        try
        {
            $response = $asi->handle($command);
            return new Response($response);
        }
        catch(\InvalidArgumentException $ex )
        {
            $response = new Response($ex->getMessage() );
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            return $response;
        }
        catch(\Exception $ex)
        {
            $response = new Response($ex->getMessage() );
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            return $response;
        }
        
    }

}
