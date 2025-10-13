@extends('layouts.admin')
@section('title', 'Crear Nuevo Plan')

@section('content')
<h1>Crear Nuevo Plan</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.planes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            
            {{-- =================== CAMPO AÑADIDO =================== --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descripción del Plan</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            {{-- ======================================================= --}}

            <div class="mb-3">
                <label for="image" class="form-label">Imagen del Plan</label>
                <input class="form-control" type="file" id="image" name="image" required>
            </div>
            <a href="{{ route('admin.planes.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar Plan</button>
        </form>
    </div>
</div>
@endsection