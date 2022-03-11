<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);

        return response()->json([
            'response' => true,
            'results' =>  ['posts' => $posts],
        ]);
    }

    public function inRandomOrder()
    {
        $posts = Post::inRandomOrder()->limit(4)->get();

        return response()->json([
            'response' => true,
            'results' =>  ['posts' => $posts],
        ]);
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $posts = Post::where('id', '>=', 1);
        if (
            array_key_exists('orderbycolumn', $data) && array_key_exists('orderbysort', $data)
        ) {
            $posts->orderBy($data['orderbycolumn'], $data['orderbysort']);
        }

        if (array_key_exists('tags', $data)) {
            return response()->json([
                'response' => true,
                'results' =>  ['posts' => $posts],
            ]);
        }

        $posts = $posts->get();

        return response()->json([
            'response' => true,
            'results' =>  ['posts' => $posts],
        ]);
    }
}
