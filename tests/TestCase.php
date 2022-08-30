<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Fixtures\WithActingUser;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();
        
        if (isset($uses[WithActingUser::class])) {
            $this->setUpWithActingUser();
        }
    }
}
