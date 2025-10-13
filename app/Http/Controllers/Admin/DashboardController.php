<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Plan;
use App\Models\Pasteleria; // <-- Añadido para el contador de pastelería
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DashboardController extends Controller
{
    public function index()
    {
        // --- Contadores Directos a la Base de Datos (Muy eficiente) ---
        $totalPlanes = Plan::count();
        $totalPasteleria = Pasteleria::count();
        $totalClicks = Click::count();
        $clicksHoy = Click::whereDate('created_at', today())->count();

        // --- Procesamiento para estadísticas de dispositivos ---
        // Para esto, sí necesitamos obtener los registros, pero solo la columna que nos interesa.
        $userAgents = Click::pluck('user_agent');
        
        $agent = new Agent();
        $desktopCount = 0;
        $mobileCount = 0;
        $tabletCount = 0;

        foreach ($userAgents as $userAgent) {
            $agent->setUserAgent($userAgent);
            if ($agent->isDesktop()) {
                $desktopCount++;
            } elseif ($agent->isTablet()) {
                $tabletCount++;
            } elseif ($agent->isMobile()) {
                $mobileCount++;
            }
        }
        
        return view('admin.dashboard', [
            'totalPlanes' => $totalPlanes,
            'totalPasteleria' => $totalPasteleria, // <-- Nueva variable para la vista
            'totalClicks' => $totalClicks,
            'clicksHoy' => $clicksHoy,
            'desktopCount' => $desktopCount,
            'mobileCount' => $mobileCount,
            'tabletCount' => $tabletCount
        ]);
    }
}