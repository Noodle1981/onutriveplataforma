@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
    
<div class="panel">
    <h1 class="mb-4">Dashboard Principal</h1>

    {{-- SECCIÓN DE ACCIONES --}}
    <div class="row">
        {{-- ... tus 4 tarjetas de Gestión (Planes, Postres, etc.) no necesitan cambios ... --}}
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Planes</h5>
                    <p class="card-text">Crear, editar y eliminar los planes de alimentación.</p>
                    <a href="{{ route('admin.planes.index') }}" class="btn btn-lg btn-primary mt-auto">Administrar Planes</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Postres</h5>
                    <p class="card-text">Añadir, editar y eliminar los postres.</p>
                    <a href="{{ route('admin.postres.index') }}" class="btn btn-lg btn-info mt-auto">Administrar Postres</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Budines</h5>
                    <p class="card-text">Añadir, editar y eliminar los budines.</p>
                    <a href="{{ route('admin.budines.index') }}" class="btn btn-lg btn-warning mt-auto">Administrar Budines</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Snacks</h5>
                    <p class="card-text">Añadir, editar y eliminar los snacks.</p>
                    <a href="{{ route('admin.snacks.index') }}" class="btn btn-lg btn-danger mt-auto">Administrar Snacks</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{--                INICIO DE LAS CORRECCIONES               --}}
    {{-- ======================================================= --}}

    {{-- SECCIÓN DE CONTADORES --}}
    <h3 class="mt-5">Contadores Rápidos</h3>
    {{-- CAMBIO: Añadimos 'justify-content-center' para centrar las columnas --}}
    <div class="row mb-5 justify-content-center"> 
        <div class="col-md-4 col-lg-3"> {{-- CAMBIO: Ajustamos el ancho de la columna --}}
            <div class="card text-white bg-info">
                <div class="card-header text-center">Clicks Totales</div>
                <div class="card-body text-center">
                    <p class="card-text fs-1 fw-bold">{{ $totalClicks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3"> {{-- CAMBIO: Ajustamos el ancho de la columna --}}
            <div class="card text-white bg-secondary">
                <div class="card-header text-center">Clicks de Hoy</div>
                <div class="card-body text-center">
                    <p class="card-text fs-1 fw-bold">{{ $clicksHoy }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCIÓN DE ESTADÍSTICAS --}}
    <h3 class="mt-5">Estadísticas de Dispositivos</h3>
    <div class="row">
        <div class="col-md-4">
            {{-- CAMBIO: Eliminamos 'text-center' del card y añadimos 'bg-white' --}}
            <div class="card bg-white"> 
                <div class="card-body text-center">
                    <i class="bi bi-display fs-1 text-primary"></i>
                    <h5 class="card-title mt-2">Escritorio</h5>
                    <p class="card-text fs-3">{{ $desktopCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <i class="bi bi-phone fs-1 text-success"></i>
                    <h5 class="card-title mt-2">Móvil</h5>
                    <p class="card-text fs-3">{{ $mobileCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <i class="bi bi-tablet fs-1 text-warning"></i>
                    <h5 class="card-title mt-2">Tablet</h5>
                    <p class="card-text fs-3">{{ $tabletCount }}</p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- ======================================================= --}}
    {{--                  FIN DE LAS CORRECCIONES                --}}
    {{-- ======================================================= --}}

    {{-- TABLAS DE POPULARIDAD --}}
    <div class="row mt-5">
        {{-- ... tus 4 tablas de popularidad no necesitan cambios ... --}}
        <div class="col-md-6">
            <h3>Planes más Populares</h3>
            <table class="table bg-white rounded shadow-sm">
                <thead><tr><th>Plan</th><th>Total Clics</th></tr></thead>
                <tbody>@foreach($planesConClicks as $plan)<tr><td>{{ $plan->name }}</td><td>{{ $plan->clicks_count }}</td></tr>@endforeach</tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Postres más Populares</h3>
            <table class="table bg-white rounded shadow-sm">
                <thead><tr><th>Postre</th><th>Total Clics</th></tr></thead>
                <tbody>@foreach($postresConClicks as $postre)<tr><td>{{ $postre->name }}</td><td>{{ $postre->clicks_count }}</td></tr>@endforeach</tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Budines más Populares</h3>
            <table class="table bg-white rounded shadow-sm">
                <thead><tr><th>Budin</th><th>Total Clics</th></tr></thead>
                <tbody>@foreach($budinesConClicks as $budin)<tr><td>{{ $budin->name }}</td><td>{{ $budin->clicks_count }}</td></tr>@endforeach</tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Snacks más Populares</h3>
            <table class="table bg-white rounded shadow-sm">
                <thead><tr><th>Snack</th><th>Total Clics</th></tr></thead>
                <tbody>@foreach($snacksConClicks as $snack)<tr><td>{{ $snack->name }}</td><td>{{ $snack->clicks_count }}</td></tr>@endforeach</tbody>
            </table>
        </div>
    </div>
    
    {{-- GRÁFICOS --}}
    <div class="row mt-5">
        {{-- ... tus gráficos no necesitan cambios ... --}}
        <div class="col-md-6">
            <h3>Clics de Hoy (por hora)</h3>
            <div class="bg-white p-3 rounded shadow-sm"><canvas id="clicksPorHoraChart"></canvas></div>
        </div>
        <div class="col-md-6">
            <h3>Clics por Mes (último año)</h3>
            <div class="bg-white p-3 rounded shadow-sm"><canvas id="clicksPorMesChart"></canvas></div>
        </div>
    </div>
</div>
@endsection
    
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Clics por Hora
    new Chart(document.getElementById('clicksPorHoraChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(@json($horasDelDia)),
            datasets: [{
                label: 'Clics',
                data: Object.values(@json($horasDelDia)),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
            }]
        }
    });

    // Gráfico de Clics por Mes
    new Chart(document.getElementById('clicksPorMesChart'), {
        type: 'line',
        data: {
            labels: Object.keys(@json($clicksPorMes)),
            datasets: [{
                label: 'Clics',
                data: Object.values(@json($clicksPorMes)),
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        }
    });
</script>
@endpush