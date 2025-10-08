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
    // 1. Obtenemos los planes y los transformamos en una sola operación.
    $planesParaLaVista = Plan::all()->map(function ($plan) {
        return [
            // El modelo usa 'name', así que accedemos como $plan->name
            'nombre' => $plan->name, 
            // El modelo usa 'image_path', así que accedemos como $plan->image_path
            'img' => asset('storage/' . $plan->image_path), 
            'wsp' => 'https://wa.me/542645820093?text=Hola%20Onnutrive%2C%20quisiera%2C%20consultar%2C%20por%2C%20el%2C%20plan%2C%20' . urlencode($plan->name),
        ];
    });

    // 2. Pasamos los datos ya transformados a la vista.
    return view('planes.planes', ['planes' => $planesParaLaVista]);
}
    // Aquí podrías añadir métodos para otras páginas:
    // public function nosotros(): View { return view('nosotros'); }
    // public function planes(): View { return view('planes'); }
}