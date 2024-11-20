<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Cambiar el idioma de la aplicación.
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLang($locale)
    {
        // Verificar si el idioma seleccionado es válido (por ejemplo: 'en', 'es')
        if (in_array($locale, ['en', 'es'])) {
            // Guardar el idioma en la sesión
            session(['locale' => $locale]);
        }

        // Redirigir al usuario a la página anterior
        return redirect()->back();
    }
}
