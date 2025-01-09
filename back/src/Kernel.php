<?php

namespace App;

use App\Kernel\DoctrineTypes;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use App\KernelBootstrap;
class Kernel extends BaseKernel
{    
    use MicroKernelTrait;          
}
