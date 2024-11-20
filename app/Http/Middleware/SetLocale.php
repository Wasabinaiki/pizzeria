<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Manejar la solicitud entrante.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Leer el idioma desde la sesión o usar el idioma predeterminado
        $locale = session('locale', config('app.locale'));

        // Establecer el idioma de la aplicación
        App::setLocale($locale);

        return $next($request);
    }
}
