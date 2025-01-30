<?php declare(strict_types=1);


use App\Controller\Contracts\Home\V1 as V1;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Serializer;

final class HomeControllerTest extends TestCase
{
    public function testUserCreateBook(): void
    {
        $e =  new V1\UserAddedBook(
            [new V1\UserAddedCategory("" , "sdsd" , ""),new V1\UserAddedCategory("" , "sdsd" , "")], 
            "title", "desc" , "sdsds" , "sdsds" ,"", true , ""
        );
        
        $serializer = new Serializer([new JsonSerializableNormalizer()], [new JsonEncoder()]);
        
        $data = $serializer->encode($e , 'json');
        
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://localhost:55555/api/home/createBook', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => $data,
        ]);

        $content = $response->getContent();    
        
    }
    
}   