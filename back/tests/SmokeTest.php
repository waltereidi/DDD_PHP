<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Lazy\LazyUuidFromString;

final class SmokeTest extends TestCase
{
    
    public function testSmokeTest(): void
    {
        $this->assertSame(true , true);
    }

}
