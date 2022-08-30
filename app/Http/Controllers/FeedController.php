<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\FeedResource;

class FeedController extends Controller
{
    public function __invoke()
    {
        /** START CODING HERE */
        $posts = Post::query()->paginate();
        return response(FeedResource::collection($posts));
        /** STOP CODING HERE */
    }
}
