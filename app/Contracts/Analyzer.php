<?php
namespace App\Contracts; 

interface Analyzer
{
    public function send(array $data): bool;
}