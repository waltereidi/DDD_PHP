<?php 


namespace App\KernelBootstrap;

use Doctrine\DBAL\Types\Type;

Type::addType('UuidType', 'App\Repository\Types\UuidType');

   