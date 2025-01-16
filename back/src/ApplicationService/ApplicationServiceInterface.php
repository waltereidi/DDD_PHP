<?php 

namespace App\ApplicationService;

/**
 * Command pattern GOF
 * handle must act as a command pattern method to delegate objects into methods
 */
interface ApplicationServiceInterface
{
    public function handle(object $command) : object ;   
}