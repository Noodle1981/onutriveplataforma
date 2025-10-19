@extends('layouts.admin') {{-- Usaremos un layout de admin dedicado (ver bonus al final) --}}

@section('title', 'Panel de Administración')

@section('content')
    
    <div class="panel">
    <h1 class="mb-4">Dashboard Principal</h1>


    {{-- SECCIÓN DE ACCIONES --}}
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Planes</h5>
                    <p class="card-text">Crear, editar y eliminar los planes de alimentación.</p>
                    <a href="{{ route('admin.planes.index') }}" class="btn btn-lg btn-primary mt-auto">
                        Administrar Planes
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Postres</h5>
                    <p class="card-text">Añadir, editar y eliminar los postres.</p>
                    <a href="{{ route('admin.postres.index') }}" class="btn btn-lg btn-info mt-auto">
                        Administrar Postres
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Budines</h5>
                    <p class="card-text">Añadir, editar y eliminar los budines.</p>
                    <a href="{{ route('admin.budines.index') }}" class="btn btn-lg btn-warning mt-auto">
                        Administrar Budines
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title">Gestión de Snacks</h5>
                    <p class="card-text">Añadir, editar y eliminar los snacks.</p>
                    <a href="{{ route('admin.snacks.index') }}" class="btn btn-lg btn-danger mt-auto">
                        Administrar Snacks
                    </a>
                </div>
            </div>
        </div>
    </div>

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

    {{-- TABLAS DE POPULARIDAD --}}
    <div class="row">
        <div class="col-md-6">
            <h3>Planes más Populares</h3>
            <table class="table">
                <thead><tr><th>Plan</th><th>Total Clics</th></tr></thead>
                <tbody>
                    @foreach($planesConClicks as $plan)
                    <tr><td>{{ $plan->name }}</td><td>{{ $plan->clicks_count }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Postres más Populares</h3>
            <table class="table">
                <thead><tr><th>Postre</th><th>Total Clics</th></tr></thead>
                <tbody>
                    @foreach($postresConClicks as $postre)
                    <tr><td>{{ $postre->name }}</td><td>{{ $postre->clicks_count }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Budines más Populares</h3>
            <table class="table">
                <thead><tr><th>Budin</th><th>Total Clics</th></tr></thead>
                <tbody>
                    @foreach($budinesConClicks as $budin)
                    <tr><td>{{ $budin->name }}</td><td>{{ $budin->clicks_count }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Snacks más Populares</h3>
            <table class="table">
                <thead><tr><th>Snack</th><th>Total Clics</th></tr></thead>
                <tbody>
                    @foreach($snacksConClicks as $snack)
                    <tr><td>{{ $snack->name }}</td><td>{{ $snack->clicks_count }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- GRÁFICOS --}}
    <div class="row mt-5">
        <div class="col-md-6">
            <h3>Clics de Hoy (por hora)</h3>
            <canvas id="clicksPorHoraChart"></canvas>
        </div>
        <div class="col-md-6">
            <h3>Clics por Mes (último año)</h3>
            <canvas id="clicksPorMesChart"></canvas>
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