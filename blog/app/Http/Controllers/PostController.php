<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostModel::paginate(3);
        return view('index', compact('posts'));
    }

    public function posts(){
        $posts = PostModel::with('user')->latest()->paginate(5);
        return view('posts', compact('posts'));
    }

    public function create(Request $request, $id)
    {

        $user = User::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        PostModel::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'category' => $request->category,
            'user_id' => $user->id,
        ]);

        return redirect()->route('posts')->with('success', 'Post Creado');
    }

    Public function createForm($id)
    {
        $user = User::find($id);
        return view('posts.create', compact('user'));
    }
}
