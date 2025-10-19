@extends('layouts.admin')
@section('title', 'Administrar Budines')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestionar Budines</h1>
    <div>
        <a href="{{ route('budines.public') }}" class="btn btn-info" target="_blank">Ver Página Pública</a>
        <a href="{{ route('admin.budines.create') }}" class="btn btn-primary ms-2">Crear Nuevo Budin</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2">Volver al Dashboard</a>
    </div>
    
</div>

{{-- ... bloque de success ... --}}

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th> {{-- <-- NUEVA COLUMNA --}}
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($budines as $budin)
                <tr>
                    <td><img src="{{ asset('storage/' . $budin->image_path) }}" alt="{{ $budin->name }}" width="100" class="rounded"></td>
                    <td class="align-middle">{{ $budin->name }}</td>
                    {{-- Usamos Str::limit para acortar descripciones largas --}}
                    <td class="align-middle">{{ Str::limit($budin->description, 50) }}</td> {{-- <-- NUEVA COLUMNA --}}
                    <td class="align-middle">
                        <a href="{{ route('admin.budines.edit', $budin) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.budines.destroy', $budin) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                {{-- Actualizamos el colspan para que coincida --}}
                <tr><td colspan="4" class="text-center">No hay budines para mostrar. ¡Crea uno!</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection