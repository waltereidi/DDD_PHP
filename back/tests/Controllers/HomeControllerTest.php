<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
final class HomeControllerTest extends TestCase
{
    public function testcontrolelr(): void
    {
   
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'http://localhost:55555/api/home/testes'
        );
        $content = $response->getContent();    
 
    }
    
}