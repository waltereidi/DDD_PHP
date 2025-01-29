<?php declare(strict_types=1);

use  App\Contracts\Home\V1 as V1; 

use App\Entity\Book;
use App\Entity\BookReader;
use App\Entity\Category;
use App\Entity\UserBookReadingNow;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
final class HomeControllerTest extends TestCase
{
    public function testcontrolelr(): void
    {
        $category = new Category();
        $category->name = "sdsd";
        $userBookReadingNow = new UserBookReadingNow();
        $userBookReadingNow->active = true;
        $createBook = new V1\CreateBook([ $category], 
            $userBookReadingNow
        );
        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $data = $serializer->encode($createBook , 'json');
        

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