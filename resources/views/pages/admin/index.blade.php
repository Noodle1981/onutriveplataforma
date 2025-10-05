@extends('layout')

@section('title', 'Panel de Administración')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestionar Planes</h1>
        <a href="{{ route('planes.create') }}" class="btn btn-primary">Crear Nuevo Plan</a>
    </div>

    {{-- Para mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
    @forelse ($planes as $plan)
        <tr>
            <td>
                {{-- ESTA ES LA LÍNEA CRÍTICA --}}
                {{-- Construimos la URL correcta para la imagen --}}
                <img src="{{ asset('storage/' . $plan->image_path) }}" alt="{{ $plan->name }}" width="100" class="rounded">
            </td>
            <td class="align-middle">{{ $plan->name }}</td>
            <td class="align-middle">
                <a href="{{ route('planes.edit', $plan) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('planes.destroy', $plan) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este plan?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">No hay planes para mostrar. ¡Crea uno!</td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>
</div>
@endsection