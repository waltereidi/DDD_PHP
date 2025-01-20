<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\ApplicationService\ApplicationServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


abstract class BaseController extends AbstractController
{
    private readonly ApplicationServiceInterface $asi;
    public function __construct(ApplicationServiceInterface $applicationService)
    {   
        $this->asi = $applicationService;
    }
    protected function handle(?object $contract ,string $command ) : Response
    {   
        try
        {
            $response = $this->asi->handle($contract,  $command);
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
