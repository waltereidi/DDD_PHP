<?php declare(strict_types=1);

use App\Domain\Books\Events\CreateBook;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Symfony\Component\HttpClient\HttpClient;
final class HomeControllerTest extends TestCase
{
    public function testcontrolelr(): void
    {
        $createBook = new CreateBook("3fc7fd5c-406f-4bde-be8d-085ef3a8f2dc" , "" , "" , "" , "") ;
        $data = json_encode(get_object_vars($createBook)) ;
        $client = HttpClient::create();

        $response = $client->request('POST', 'http://localhost:55555/api/home/createBook', [
            'headers' => [
                'Content-Type: application/json',
                'Accept: application/json',
            ],
            'body' => $data,
        ]);
        $content = $response->getContent();    
        
    }
    
}   