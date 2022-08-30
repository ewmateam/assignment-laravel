<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Post;

class FeedControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_get_feed()
    {
        factory(Post::class, 10)->create();

        $this->getJson(route('feed'))
            ->assertOk()
            ->assertJsonCount(10);
    }

    public function test_can_get_feed_without_duplicate_queries()
    {
        factory(Post::class, 10)->create();
        $userQueryCount = 0;
        DB::listen(function($q) use (&$userQueryCount) {
            if(Str::contains($q->sql, 'users')){
                $userQueryCount++;
            }
        });

        $this->getJson(route('feed'))
            ->assertOk();

        $this->assertEquals(1, $userQueryCount, "The Feed API is still executing too many queries on users table:");
        
    }
}
