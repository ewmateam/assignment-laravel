<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\FeedResource;

class FeedController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->get();
        /** START CODING HERE */
        
        /** STOP CODING HERE */
        return response(FeedResource::collection($posts));
    }
}
