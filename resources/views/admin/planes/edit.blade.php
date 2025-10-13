@extends('layouts.admin')
@section('title', 'Editar Plan')

@section('content')
<h1>Editar Plan: {{ $plan->name }}</h1>

{{-- ... bloque de errores ... --}}

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.planes.update', $plan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plan->name) }}" required>
            </div>
            
            {{-- =================== CAMPO AÑADIDO =================== --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descripción del Plan</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $plan->description) }}</textarea>
            </div>
            {{-- ======================================================= --}}

            <div class="mb-3">
                <label for="image" class="form-label">Nueva Imagen (Opcional)</label>
                <input class="form-control" type="file" id="image" name="image">
                <div class="mt-2">
                    <small>Imagen Actual:</small><br>
                    <img src="{{ asset('storage/' . $plan->image_path) }}" alt="{{ $plan->name }}" width="150" class="rounded">
                </div>
            </div>
            <a href="{{ route('admin.planes.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Plan</button>
        </form>
    </div>
</div>
@endsection