<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver; // O usa ImagickDriver si prefieres
use Spatie\ImageOptimizer\OptimizerChainFactory;

use function Laravel\Prompts\search;

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
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Máx 5MB
        ]);

        // Logic of the images
        $imagePath = null;
        if ($request->hasFile('img')){
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/images/' . $imageName;
    
            // Mover la imagen al directorio final
            $image->move(public_path('uploads/images'), $imageName);

            //Optimizamos imagenes
            $this->imageOptimize($imagePath);
        }

        PostModel::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'category' => $request->category,
            'user_id' => $user->id,
            'image' =>  $imagePath,
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
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);


        // Manejar la subida de una nueva imagen
        $imagePath = $post->image; // Mantener la imagen anterior si no se sube una nueva
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/images/' . $imageName;

            // Mover la nueva imagen
            $image->move(public_path('uploads/images'), $imageName);

            // Opcional: Eliminar la imagen anterior del servidor
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'category' => $request->category,
            'image' => $imagePath,
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

    private function imageOptimize($imagePath): void
    {
        $fullPath = public_path($imagePath);
    
        $manager = new ImageManager(new GdDriver());
        $img = $manager->read($fullPath);
    
        // Redimensionar con aspecto de relación mantenido
        $img->scale(1080);
    
        // Guardar como WebP con calidad 85
        $optimizedPath = str_replace(pathinfo($fullPath, PATHINFO_EXTENSION), 'webp', $fullPath);
        $img->toWebp(quality: 85)->save($optimizedPath);
    
        // Reemplazar el archivo original con la imagen optimizada
        if (file_exists($optimizedPath)) {
            unlink($fullPath); // Elimina el archivo original
            rename($optimizedPath, $fullPath); // Renombra la imagen optimizada
        }
    
        // Optimización adicional con Spatie
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($fullPath);
    }

    public function search(Request $request)
    {
        $search = $request->input('search'); // Obtener el término de búsqueda
    
        if ($search) {
            // Realizar la búsqueda
            $posts = PostModel::where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('slug', 'like', "%$search%")
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%") // Busca por nombre del autor
                          ->orWhere('lastname', 'like', "%$search%"); // Opcional: apellido del autor
                })
                ->latest()
                ->paginate(10); // Paginar los resultados
        } else {
            // Si no hay búsqueda, devuelve todos los posts
            $posts = PostModel::latest()->paginate(10);
        }
    
        // Retornar la vista con los resultados
        return view('posts', compact('posts'));
    }
    
}