@extends('layouts.admin')
@section('title', 'Administrar Pastelería')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestionar Pastelería</h1>
    <a href="{{ route('admin.pasteleria.create') }}" class="btn btn-primary">Añadir Producto</a>
</div>

{{-- ... mensaje de éxito ... --}}

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pasteleria as $item) {{-- Usamos la variable $pasteleria del controlador --}}
                <tr>
                    <td><img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" width="100" class="rounded"></td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{ Str::limit($item->description, 50) }}</td>
                    <td class="align-middle">
                        <a href="{{ route('admin.pasteleria.edit', $item) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.pasteleria.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">No hay productos para mostrar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection