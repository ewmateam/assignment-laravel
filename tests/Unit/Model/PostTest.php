<?php

namespace Tests\Unit\Model;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Mockery\Exception\InvalidCountException;
use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_call_log_facade_on_post_creation()
    {
        $log = Log::spy();
        factory(Post::class)->create();
        try {
            $log->shouldHaveReceived('info');
        } catch(InvalidCountException $e)
        {
            $this->fail("Log::info is not being called on Post creation");
        }
    }

    public function test_can_load_without_any_relations()
    {
        factory(Post::class)->create();
        $model = Post::query()->first();
        $this->assertEmpty($model->getRelations(), "The Post model may not force load any relations by default");
    }
}
