<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostModel::paginate(3);
        return view('index', compact('posts'));
    }

    public function posts(){
        $posts = PostModel::latest()->paginate(5);
        return view('posts', compact('posts'));
    }
}
