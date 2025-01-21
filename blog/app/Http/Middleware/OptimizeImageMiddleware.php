<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver; // O usa ImagickDriver si prefieres
use Spatie\ImageOptimizer\OptimizerChainFactory;

class OptimizeImageMiddleware
{
    protected $manager;

    public function __construct()
    {
        // Inicializa el ImageManager con el driver deseado
        $this->manager = new ImageManager(new GdDriver()); // Cambia a ImagickDriver si usas Imagick
    }

    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            // Validar la imagen y sus extensiones permitidas
            if ($image->isValid() && in_array($image->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif', 'webp'])) {
                $path = storage_path('app/temp');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $tempPath = $path . '/' . $imageName;

                // Lee la imagen desde el archivo y realiza las operaciones necesarias
                $img = $this->manager->read($image->getRealPath());

                // Mantiene el aspect ratio
                $img->scale('1080'); // with 1080
                
                // Guardar la imagen como JPEG optimizado
                $img->toWebp(85)->save($tempPath); // 85% de calidad

                // Optimización opcional con Spatie Image Optimizer
                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($tempPath);

                // Reemplaza el archivo en la solicitud
                $request->files->set('img', new \Illuminate\Http\UploadedFile(
                    $tempPath,
                    $imageName,
                    $image->getClientMimeType(),
                    null,
                    true // archivo temporal
                ));
            }
        }

        return $next($request);
    }
}
