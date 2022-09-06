<?php
namespace App\Contracts; 

interface AnalyzerDriver
{
    public function send(array $data): bool;
}