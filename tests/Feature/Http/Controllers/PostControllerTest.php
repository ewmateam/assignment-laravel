<?php

namespace Tests\Feature\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Fixtures\WithActingUser;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use WithActingUser;

    public function test_can_index_post()
    {
        factory(Post::class, 10)->create();
        
        $this->getJson(route('post.index'))
            ->assertOk()
            ->assertJsonCount(10, 'data');
    }

    public function test_can_create_post()
    {
        
        $this->postJson(route('post.store'), [
            'text' => $postText = $this->faker->text(255),
        ])
        ->assertCreated();


        $this->assertDatabaseHas('posts', [
            'user_id' => $this->user->getKey(),
            'text' => $postText,
        ]);
    }

    public function test_can_update_post()
    {
        $post = factory(Post::class)->create();

        $this->putJson(route('post.update', ['post' => $post->getKey()]), [
            'text' => $postText = $this->faker->text(255),
        ])
        ->assertOk();


        $this->assertDatabaseHas('posts', [
            'id' => $post->getKey(),
            'text' => $postText,
        ]);
    }

    public function test_can_destroy_post()
    {
        $post = factory(Post::class)->create();

        $this->deleteJson(route('post.destroy', ['post' => $post->getKey()]))
        ->assertNoContent();


        $this->assertDatabaseMissing('posts', [
            'id' => $post->getKey()
        ]);
    }
}
