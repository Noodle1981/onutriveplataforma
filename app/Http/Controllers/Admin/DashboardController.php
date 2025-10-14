<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Plan;
use App\Models\Pasteleria;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class DashboardController extends Controller
{
    public function index()
    {
        // --- Clicks por Modelo (Esto ya es compatible) ---
        $planesConClicks = Plan::withTrashed()->withCount('clicks')->orderBy('clicks_count', 'desc')->get();
        $pasteleriaConClicks = Pasteleria::withTrashed()->withCount('clicks')->orderBy('clicks_count', 'desc')->get();
        
        // --- Clicks por Hora (del día actual) - VERSIÓN COMPATIBLE ---
        // 1. Obtenemos solo la columna 'created_at' de los clics de hoy.
        $clicksDeHoy = Click::whereDate('created_at', today())->pluck('created_at');

        // 2. Inicializamos un array para las 24 horas del día con ceros.
        $horasDelDia = array_fill(0, 24, 0);

        // 3. Procesamos los datos con PHP.
        foreach ($clicksDeHoy as $timestamp) {
            $hora = $timestamp->hour; // Usamos el objeto Carbon de Laravel para obtener la hora
            if (isset($horasDelDia[$hora])) {
                $horasDelDia[$hora]++;
            }
        }

        // --- Clicks por Mes (últimos 12 meses) - VERSIÓN COMPATIBLE ---
        // 1. Obtenemos los clics del último año.
        $clicksUltimoAnio = Click::where('created_at', '>=', now()->subYear())->pluck('created_at');
        
        // 2. Inicializamos un array para los últimos 12 meses.
        $clicksPorMes = [];
        for ($i = 11; $i >= 0; $i--) {
            $mes = now()->subMonths($i)->format('Y-m');
            $clicksPorMes[$mes] = 0;
        }

        // 3. Procesamos los datos con PHP.
        foreach ($clicksUltimoAnio as $timestamp) {
            $mes = $timestamp->format('Y-m');
            if (isset($clicksPorMes[$mes])) {
                $clicksPorMes[$mes]++;
            }
        }

        // --- El resto del controlador (dispositivos, etc.) no necesita cambios ---
        $userAgents = Click::pluck('user_agent');
        $agent = new Agent();
        $desktopCount = 0;
        $mobileCount = 0;
        $tabletCount = 0;

        $totalPlanes = Plan::count();
        $totalPasteleria = Pasteleria::count();
        $totalClicks = Click::count();
        $clicksHoy = Click::whereDate('created_at', today())->count();


        foreach ($userAgents as $userAgent) {
            $agent->setUserAgent($userAgent);
            if ($agent->isDesktop()) $desktopCount++;
            elseif ($agent->isTablet()) $tabletCount++;
            elseif ($agent->isMobile()) $mobileCount++;
        }
        
        return view('admin.dashboard', compact(
            'planesConClicks', 
            'pasteleriaConClicks',
            'horasDelDia',
            'clicksPorMes',
            'desktopCount',
            'mobileCount',
            'tabletCount',

            'totalPlanes',
            'totalPasteleria',
            'totalClicks',
            'clicksHoy'


        ));
    
    }}