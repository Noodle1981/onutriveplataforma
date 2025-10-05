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
        // 1. Obtenemos todos los planes desde la base de datos.
        $planes_desde_db = Plan::all();

        // 2. Transformamos los datos al formato que la vista espera.
        //    El modelo tiene 'image_path', pero la vista espera 'image'.
        //    Este 'map' crea un nuevo array con la estructura correcta.
        $planesParaLaVista = $planes_desde_db->map(function ($plan) {
            return [
                'id' => $plan->id,
                'name' => $plan->name,
                'image' => $plan->image_path, // Aquí hacemos el "mapeo"
            ];
        });

        // 3. Pasamos los datos transformados a la vista.
        //    Laravel buscará en resources/views/planes/planes.blade.php
        return view('planes.planes', ['planes' => $planesParaLaVista]);
    }
    // Aquí podrías añadir métodos para otras páginas:
    // public function nosotros(): View { return view('nosotros'); }
    // public function planes(): View { return view('planes'); }
}