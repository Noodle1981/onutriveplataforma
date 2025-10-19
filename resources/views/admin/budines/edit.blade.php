@extends('layouts.admin')
@section('title', 'Editar Budín')

@section('content')
<h1>Editar Budín: {{ $budin->name }}</h1>

{{-- ... bloque de errores ... --}}

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.budines.update', $budin) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Budín</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $budin->name) }}" required>
            </div>
            
            {{-- =================== CAMPO AÑADIDO =================== --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descripción del Budín</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $budin->description) }}</textarea>
            </div>
            {{-- ======================================================= --}}

            <div class="mb-3">
                <label for="image" class="form-label">Nueva Imagen (Opcional)</label>
                <input class="form-control" type="file" id="image" name="image">
                <div class="mt-2">
                    <small>Imagen Actual:</small><br>
                    <img src="{{ asset('storage/' . $budin->image_path) }}" alt="{{ $budin->name }}" width="150" class="rounded">
                </div>
            </div>
            <a href="{{ route('admin.budines.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Budín</button>
        </form>
    </div>
</div>
@endsection