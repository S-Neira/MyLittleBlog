<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $posts = PostModel::all();
        return view('posts.dashboard', compact('user', 'posts'));
    }
}
