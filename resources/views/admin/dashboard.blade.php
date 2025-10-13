@extends('layouts.admin') {{-- Usaremos un layout de admin dedicado (ver bonus al final) --}}

@section('title', 'Panel de Administración')

@section('content')
    <h1 class="mb-4">Dashboard Principal</h1>

    {{-- SECCIÓN DE CONTADORES --}}
    {{-- SECCIÓN DE CONTADORES --}}
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-header">Clicks Totales</div>
                <div class="card-body">
                    <p class="card-text fs-2 fw-bold">{{ $totalClicks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary">
                <div class="card-header">Clicks de Hoy</div>
                <div class="card-body">
                    <p class="card-text fs-2 fw-bold">{{ $clicksHoy }}</p>
                </div>
            </div>
        </div>
        {{-- ... más tarjetas ... --}}
    </div>

    {{-- SECCIÓN DE ESTADÍSTICAS --}}
    <h3>Estadísticas de Dispositivos</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-display fs-1"></i>
                    <h5 class="card-title mt-2">Escritorio</h5>
                    <p class="card-text fs-3">{{ $desktopCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-phone fs-1"></i>
                    <h5 class="card-title mt-2">Móvil</h5>
                    <p class="card-text fs-3">{{ $mobileCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-tablet fs-1"></i>
                    <h5 class="card-title mt-2">Tablet</h5>
                    <p class="card-text fs-3">{{ $tabletCount }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCIÓN DE ACCIONES --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Gestión de Planes</h5>
                    <p class="card-text">Crear, editar y eliminar los planes de alimentación.</p>
                    <a href="{{ route('admin.planes.index') }}" class="btn btn-lg btn-primary">
                        Administrar Planes
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Gestión de Pastelería</h5>
                    <p class="card-text">Añadir, editar y eliminar productos de pastelería.</p>
                    <a href="{{ route('admin.pasteleria.index') }}" class="btn btn-lg btn-success">
                        Administrar Pastelería
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection