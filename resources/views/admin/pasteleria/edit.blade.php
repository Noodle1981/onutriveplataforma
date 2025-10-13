@extends('layouts.admin')
@section('title', 'Editar Producto')

@section('content')
<h1>Editar Producto: {{ $pastelerium->name }}</h1> {{-- Usamos la variable $pastelerium --}}

{{-- ... errores ... --}}

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pasteleria.update', $pastelerium) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pastelerium->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $pastelerium->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Nueva Imagen (Opcional)</label>
                <input class="form-control" type="file" id="image" name="image">
                <div class="mt-2">
                    <small>Imagen Actual:</small><br>
                    <img src="{{ asset('storage/' . $pastelerium->image_path) }}" alt="{{ $pastelerium->name }}" width="150" class="rounded">
                </div>
            </div>
            <a href="{{ route('admin.pasteleria.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
</div>
@endsection