<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario

        // Invalidar la sesión actual
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige a la página de inicio o login
        return redirect()->route('index')->with('success', 'Has cerrado sesión correctamente.');
    }
}
