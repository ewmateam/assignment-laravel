<?php

namespace Tests\Feature;

use App\Contracts\Analyzer;
use Illuminate\Contracts\Container\BindingResolutionException;
use Tests\TestCase;

class AnalyzerTest extends TestCase
{
    public function test_can_resolve_analyzer()
    {
        try {
            app()->make(Analyzer::class);
        } catch (BindingResolutionException $e) {
            $this->fail(
                "Failed to resolve " . 
                Analyzer::class . 
                " are you binding the analyzer correctly?"
            );
        }
    }
}
