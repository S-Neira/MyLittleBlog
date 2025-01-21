<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Cierra la sesión del usuario y elimina la cuenta.
     */
    public function logout(Request $request)
    {
        // Obtener el usuario antes de cerrar sesión
        $user = User::find(Auth::id());

        if ($user) {
            // Eliminar los posts del usuario
            $userPosts = PostModel::where('user_id', $user->id)->get();
            foreach ($userPosts as $post) {
                $post->delete();
            }

            // Eliminar el usuario
            $user->delete();

            // Invalidar y regenerar la sesión
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Cerrar sesión
            Auth::logout();
        }

        // Redirige a la página de inicio
        return redirect()->route('index')->with('success', 'Tu cuenta y posts han sido eliminados.');
    }
}
