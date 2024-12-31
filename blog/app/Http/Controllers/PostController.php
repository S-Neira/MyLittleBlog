<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostModel::all();
        return view('index', compact('posts'));
    }
}
