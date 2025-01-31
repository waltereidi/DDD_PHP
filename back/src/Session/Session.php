<?php
namespace App\Session;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class Session
{
    private array $keys = [
        'user_id'=>'user_id from user entity'
    ];
    private function __contruct()
    {
        session_start([
            'cookie_lifetime' => 86400,
            'read_and_close'  => true,
        ]);
    }
    private function getValue(string $key):?string
    {
        if(isset($_SESSION[$key['user_id']]))
            return $_SESSION[$key['user_id']];
        
        return null;
    }
    public function getUser_id() : LazyUuidFromString
    {
        $value = $this->getValue($this->keys['user_id']);
        
        return $value == null 
            ? Uuid::fromString($value)
            : null;
    }
    public function setUser_id(LazyUuidFromString $user_id) :void 
    {
        $_SESSION[$this->keys['user_id']] = $user_id->toString(); 
    }

}