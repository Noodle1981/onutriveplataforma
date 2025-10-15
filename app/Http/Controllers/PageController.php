<?php
// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Plan; // Asegúrate de importar el modelo Plan

class PageController extends Controller
{
    /**
     * Muestra la página de inicio.
     */
    public function home(): View
    {
        // Simplemente retorna la vista 'home'.
        // Laravel automáticamente buscará 'resources/views/home.blade.php'.
        return view('home');
    }

public function planes(): View
{
    // 1. Obtenemos todos los planes activos de la base de datos
    $planes = Plan::latest()->get();

    // 2. Transformamos la colección en un array simple, listo para ser convertido a JSON.
    //    Esta es la "lógica" que movemos del Blade al Controlador.
    $planesParaJs = $planes->map(function ($plan) {
        return [
            'id' => $plan->id,
            'nombre' => $plan->name,
            'description' => $plan->description,
            'img' => asset('storage/' . $plan->image_path),
            'wsp' => 'https://wa.me/542645820093?text=Hola%20Onnutrive%2C%20quisiera%20consultar%20por%20el%20plan%20' . urlencode($plan->name),
        ];
    });

    // 3. Pasamos ESE array ya preparado a la vista.
    return view('planes.planes', ['planes' => $planesParaJs]);
}
    public function viandas(): View
    {
        return view('viandas.viandas');
    }

    public function pasteleria(): View
    {
        return view('pasteleria.pasteleria');
    }
}