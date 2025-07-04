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
            [new V1\UserAddedCategory("" , "sdsd" , null ),new V1\UserAddedCategory("" , "sdsd" , "")], 
            "",
            "Principles: Life and Work", 
            "In Principles, Dalio shares what he’s learned over the course of his remarkable career. He argues that life, management, economics, and investing can all be systemized into rules and understood like machines. The book’s hundreds of practical lessons, which are built around his cornerstones of “radical truth” and “radical transparency,” include Dalio laying out the most effective ways for individuals and organizations to make decisions, approach challenges, and build strong teams. He also describes the innovative tools the firm uses to bring an idea meritocracy to life, such as creating “baseball cards” for all employees that distill their strengths and weaknesses, and employing computerized decision-making systems to make believability-weighted decisions. While the book brims with novel ideas for organizations and institutions, Principles also offers a clear, straightforward approach to decision-making that Dalio believes anyone can apply, no matter what they’re seeking to achieve." , 
            "1501124021" , 
            true, 
            "commentary" , 
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