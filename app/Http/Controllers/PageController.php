<?php
// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Plan; // Asegúrate de importar el modelo Plan
use App\Models\Snack; // Asegúrate de importar el modelo Snack
use App\Models\Budin; // Asegúrate de importar el modelo Budin
use App\Models\Postre; // Asegúrate de importar el modelo Postre
use App\Models\Pasteleria; // Asegúrate de importar el modelo Pasteler



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
        $planes = Plan::latest()->get();

        $planesParaJs = $planes->map(function ($plan) {
            // 1. Construimos el mensaje de WhatsApp detallado
            $whatsappMessage = "Hola Onnutrive, quisiera consultar por el siguiente plan:\n\n";
            $whatsappMessage .= "*Plan:* " . $plan->name . "\n";
            $whatsappMessage .= "*Descripción:* " . $plan->description;

            // 2. Creamos la URL completa, codificando el mensaje
            $wspUrl = 'https://wa.me/542645820093?text=' . urlencode($whatsappMessage);
            
            // 3. Devolvemos el array con la nueva URL de WhatsApp
            return [
                'id' => $plan->id,
                'nombre' => $plan->name,
                'description' => $plan->description,
                'img' => asset('storage/' . $plan->image_path),
                'wsp' => $wspUrl, // <-- ¡La URL ahora es mucho más potente!
            ];
        });

        return view('planes.planes', ['planes' => $planesParaJs]);
    }
    
public function snacks(): View
    {
        $snacks = Snack::latest()->get();

        $snacksParaJs = $snacks->map(function ($snack) {
            // 1. Construimos el mensaje de WhatsApp detallado
            $whatsappMessage = "Hola Onnutrive, quisiera consultar por el siguiente snack:\n\n";
            $whatsappMessage .= "*Snack:* " . $snack->name . "\n";
            $whatsappMessage .= "*Descripción:* " . $snack->description;

            // 2. Creamos la URL completa, codificando el mensaje
            $wspUrl = 'https://wa.me/542645820093?text=' . urlencode($whatsappMessage);
            
            // 3. Devolvemos el array con la nueva URL de WhatsApp
            return [
                'id' => $snack->id,
                'nombre' => $snack->name,
                'description' => $snack->description,
                'img' => asset('storage/' . $snack->image_path),
                'wsp' => $wspUrl, // <-- ¡La URL ahora es mucho más potente!
            ];
        });

        return view('snacks.snacks', ['snacks' => $snacksParaJs]);
    }
public function budines(): View
    {
        $budines = Budin::latest()->get();

        $budinesParaJs = $budines->map(function ($budin) {
            // 1. Construimos el mensaje de WhatsApp detallado
            $whatsappMessage = "Hola Onnutrive, quisiera consultar por el siguiente budín:\n\n";
            $whatsappMessage .= "*Budín:* " . $budin->name . "\n";
            $whatsappMessage .= "*Descripción:* " . $budin->description;

            // 2. Creamos la URL completa, codificando el mensaje
            $wspUrl = 'https://wa.me/542645820093?text=' . urlencode($whatsappMessage);
            
            // 3. Devolvemos el array con la nueva URL de WhatsApp
            return [
                'id' => $budin->id,
                'nombre' => $budin->name,
                'description' => $budin->description,
                'img' => asset('storage/' . $budin->image_path),
                'wsp' => $wspUrl, // <-- ¡La URL ahora es mucho más potente!
            ];
        });

        return view('budines.budines', ['budines' => $budinesParaJs]);
    }

public function postres(): View
    {
        $postres = Postre::latest()->get();

        $postresParaJs = $postres->map(function ($postre) {
            // 1. Construimos el mensaje de WhatsApp detallado
            $whatsappMessage = "Hola Onnutrive, quisiera consultar por el siguiente postre:\n\n";
            $whatsappMessage .= "*Postre:* " . $postre->name . "\n";
            $whatsappMessage .= "*Descripción:* " . $postre->description;

            // 2. Creamos la URL completa, codificando el mensaje
            $wspUrl = 'https://wa.me/542645820093?text=' . urlencode($whatsappMessage);
            
            // 3. Devolvemos el array con la nueva URL de WhatsApp
            return [
                'id' => $postre->id,
                'nombre' => $postre->name,
                'description' => $postre->description,
                'img' => asset('storage/' . $postre->image_path),
                'wsp' => $wspUrl, // <-- ¡La URL ahora es mucho más potente!
            ];
        });

        return view('postres.postres', ['postres' => $postresParaJs]);
    }

public function pasteleria(): View
    {
        // Aplicamos la misma lógica para pastelería
        $pasteles = Pasteleria::latest()->get();

        $pastelesParaJs = $pasteles->map(function ($pastel) {
            $whatsappMessage = "Hola Onnutrive, quisiera consultar por el siguiente producto de pastelería:\n\n";
            $whatsappMessage .= "*Producto:* " . $pastel->name . "\n";
            $whatsappMessage .= "*Descripción:* " . $pastel->description;

            $wspUrl = 'https://wa.me/542645820093?text=' . urlencode($whatsappMessage);
            
            return [
                'id' => $pastel->id,
                'nombre' => $pastel->name,
                'description' => $pastel->description,
                'img' => asset('storage/' . $pastel->image_path),
                'wsp' => $wspUrl,
            ];
        });

        // ¡IMPORTANTE! Asegúrate de tener una vista para pastelería
        // return view('pasteleria.publica', ['pasteles' => $pastelesParaJs]);
        // Por ahora, solo devolvemos la vista estática que tenías
        return view('pasteleria.pasteleria', ['pasteles' => $pastelesParaJs]);
    }

    public function viandas(): View
    {
        return view('viandas.viandas');
    }
}