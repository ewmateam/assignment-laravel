<?php

namespace Tests\Fixtures;

use App\User;

trait WithActingUser 
{
    private $user;

    public function setUpWithActingUser(): void
    {
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }
}