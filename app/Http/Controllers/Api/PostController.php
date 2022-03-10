<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'response' => true,
            'results' =>  ['posts' => $posts],
        ]);
    }

    public function inRandomOrder()
    {
        $posts = Post::inRandomOrder()->limit(5)->get();

        return response()->json([
            'response' => true,
            'results' =>  ['posts' => $posts],
        ]);
    }
}
