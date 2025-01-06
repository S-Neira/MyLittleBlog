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

        return redirect()->route('dashboard', $user->id)->with('success', 'Post Creado');
    }

    public function createForm($id)
    {
        $user = User::find($id);
        return view('posts.create', compact('user'));
    }

    public function editForm($id)
    {
        $post = PostModel::find($id);
        return view('posts.edit', compact('post'));
    }

    public function edit(Request $request, $id)
    {
        $post = PostModel::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'category' => $request->category,
        ]);

        return redirect()->route('dashboard', $post->user_id)->with('success', 'Post Actualizado');
    }

    public function delete($id)
    {
        $post = PostModel::find($id);
        $post->delete();
        return redirect()->route('dashboard', $post->user_id)->with('success', 'Post Eliminado');
    }

    public function show($slug)
    {
        $post = PostModel::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }
}
